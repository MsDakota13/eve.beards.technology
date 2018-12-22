import json
import mysql.connector as dbcon
import requests
import math
from time import sleep
import multiprocessing
import concurrent.futures
import traceback
import os
from itertools import groupby
import time
import logging
import configparser

class Miner(object):

    def __init__(self):
        self.config = configparser.ConfigParser()
        #self.config.read('../config/example.ini')
        self.config.read('../config/dev.ini')

        logging.basicConfig(filename=self.config.get('Logging', 'logLocation'),level=logging.INFO)

        self.username = self.config.get('Database', 'username')
        self.password = self.config.get('Database', 'password')
        self.database_name = self.config.get('Database', 'database_name')
        self.poolSize = self.config.get('Settings', 'ProcessPool')

        self.base_url='https://crest-tq.eveonline.com/market/{}/orders/all/'
        self.add_item='INSERT INTO Data (QuantityBuy, AvgBuy, WeightedBuy, HighBuy, LowBuy, QuantitySell, AvgSell, WeightedSell, LowSell, HighSell, typeID, regionID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
        self.get_id='SELECT ID FROM Regions'
        self.tupleList = []

    # calculate all needed values
    def calculate(self,json):
        quantity = 0
        priceTotal = 0

        # get half the list length and if longer then 10, if it is use 10 instead
        jsonLength = int(math.ceil(len(json) / 2))
        if jsonLength > 10:
            jsonLength = 10
        elif jsonLength == 0:
            return (0, 0, 0, 0, 0)

        # print results as test
        for item in json[:jsonLength]:
                quantity = quantity + item['volume']
                priceTotal = priceTotal + item['price']

        weightedAvg = 0

        #calc weighted
        for item in json[:jsonLength]:
                weightedAvg = weightedAvg + ((float(item['volume']) / quantity) * float(item['price']))

        return (quantity, round(priceTotal/jsonLength, 2), round(weightedAvg, 2), json[0]['price'], json[jsonLength -1]['price'])

    def writeList(self, buyResults, sellResults, item, region):
        #write list interactions here
        buyTuple = self.calculate(buyResults)
        sellTuple = self.calculate(sellResults)
        idTuple = (item, region)

        if buyTuple is None:
            buyTuple = (0, 0, 0, 0, 0)

        if sellTuple is None:
            sellTuple =(0, 0, 0, 0, 0)

        returnTuple = (buyTuple + sellTuple + idTuple)

        return returnTuple

    def checkID(self,argsTuple):
        tmpList = argsTuple[0]
        regId = argsTuple[1]
        if bool(tmpList):
            buyResults = [item for item in tmpList if item['buy'] == True]
            sellResults = [item for item in tmpList if item['buy'] == False]
            buyResults = sorted(buyResults, key=lambda k: int(k['price']), reverse=True)
            sellResults = sorted(sellResults, key=lambda k: int(k['price']), reverse=False)
            return self.writeList(buyResults, sellResults,tmpList[0]['type'], regId)

    #groups data retrieved from CREST api
    def groupData(self,jsonItems, regId):
        jsonItems['items'] = sorted(jsonItems['items'], key=lambda x: (x['type'], x['buy'], x['price']))

        with concurrent.futures.ThreadPoolExecutor(int(self.poolSize)) as executor:
            future_to_data = {executor.submit(self.checkID, (list(item), regId)) for key, item in groupby(jsonItems['items'], lambda x: x['type'])}
            for future in concurrent.futures.as_completed(future_to_data):
                self.tupleList.append(future.result())
            
    #get data from CREST api
    def mineData(self,regId):
        # get page count to make future resilient
        resp = requests.get(self.base_url.format(regId))
        if resp.status_code != 200:
            raise ApiError('GET /market/{}/orders/all/ {}'.format(regId, resp.status_code))
        pageCount = resp.json()['pageCount']
        jsonItems = resp.json()

        # start loop to get all data
        for x in range(1, pageCount + 1):
            url = '{}?page={}'.format(self.base_url.format(regId), x)
            resp = requests.get(url)
            if resp.status_code != 200:
                raise ApiError('GET {} {}'.format(url, resp.status_code))
            jsonItems['items'] = jsonItems['items'] + resp.json()['items']
        
        #(int(), int()) use tuple for multiple key values
        jsonItems['items'] = sorted(jsonItems['items'], key=lambda k: (int(k['type']),int(k['buy']),int(k['price'])))

        #process data
        self.groupData(jsonItems, regId)

    def getRegions(self):
        # setup connection for query
        cnx = dbcon.connect(user='%s' % (self.username), password='%s' % (self.password), database='%s' % (self.database_name))
        cursor = cnx.cursor()

        #process data
        cursor.execute(self.get_id)
        ids = []
        for tid in cursor:
           ids.append(str(*tid))

        # close connection
        cnx.commit()
        cursor.close()
        cnx.close()
        
        return ids

    def chunks(self, l, n):
        for i in range(0, len(l), n):
            yield l[i:i +n]

    def writeDBTask(self,tuplList):
        # start database connection (localhost)
        cnx = dbcon.connect(user='%s' % (self.username), password='%s' % (self.password), database='%s' % (self.database_name))
        cursor = cnx.cursor()

        for tupl in tuplList:
            cursor.execute(self.add_item, tupl)

        # close connection
        cnx.commit()
        cursor.close()
        cnx.close()

    def writeDB(self):
        start = time.time()

        executor = concurrent.futures.ProcessPoolExecutor(int(self.poolSize))
        futures = [executor.submit(self.writeDBTask, tuplList) for tuplList in self.chunks(self.tupleList, math.ceil(len(self.tupleList)/5))]
        concurrent.futures.wait(futures)

        end = time.time()
        logging.info('Database writing took: {}'.format(end - start))

    def run(self):
        start = time.time()
        logging.info('Number of processes: {}'.format(self.poolSize))
        logging.info('Run started on: {}'.format(time.ctime(start)))
        for region in self.getRegions():
            logging.info('Started mining and processing: {}'.format(region))
            self.mineData(region)
        self.writeDB()
        end = time.time()
        logging.info('Run took: {}'.format(end - start))

if __name__ == "__main__":
    miner = Miner()
    miner.run()

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

Config = configparser.ConfigParser()
#Config.read('../config/example.ini')
#Config.read('../config/dev.ini')
Config.read('/home/jan/eve.beards.technology/python/miner/config/test.ini')
#Config.read('../config/prod.ini')

logging.basicConfig(filename=Config.get('Logging', 'logLocation'),level=logging.INFO)

username = Config.get('Database', 'username')
password = Config.get('Database', 'password')
database_name = Config.get('Database', 'database_name')
poolSize = Config.get('Settings', 'ProcessPool')

base_url='https://crest-tq.eveonline.com/market/{}/orders/all/'
add_item='INSERT INTO Data (QuantityBuy, AvgBuy, WeightedBuy, HighBuy, LowBuy, QuantitySell, AvgSell, WeightedSell, LowSell, HighSell, typeID, regionID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
get_id='SELECT ID FROM Regions'

# calculate all needed values
def calculate(json):
    try:
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
    except:
        print('>>>>> START OF TRACEBACK <<<<<')
        print('Error encountered during data processing: ')
        traceback.print_exc()
        print('>>>>> END OF TRACEBACK <<<<<')
        pass

def writeDB(buyResults, sellResults, item, region):
    try:
        # start database connection (localhost)
        cnx = dbcon.connect(user='%s' % (username), password='%s' % (password), database='%s' % (database_name))
        cursor = cnx.cursor()

        #write db interactions here
        buyTuple = calculate(buyResults)
        sellTuple = calculate(sellResults)
        idTuple = (item, region)

        cursor.execute(add_item, buyTuple + sellTuple + idTuple)

        # clean up
        cnx.commit()
        cursor.close()
        cnx.close()
    except:
        logging.error('>>>>> START OF TRACEBACK <<<<<')
        logging.error('Error encountered during data processing: ')
        logging.error('Following exception occured', exc_info=(traceback))
        logging.error('>>>>> END OF TRACEBACK <<<<<')
        pass

def checkID(argsTuple):
    try:
        tmpList = argsTuple[0]
        regId = argsTuple[1]
        if bool(tmpList):
            buyResults = [item for item in tmpList if item['buy'] == True]
            sellResults = [item for item in tmpList if item['buy'] == False]
            buyResults = sorted(buyResults, key=lambda k: int(k['price']), reverse=True)
            sellResults = sorted(sellResults, key=lambda k: int(k['price']), reverse=False)
            writeDB(buyResults, sellResults,tmpList[0]['type'], regId)
    except:
        print('>>>>> START OF TRACEBACK <<<<<')
        print('Error encountered during data processing: ')
        traceback.print_exc()
        print('>>>>> END OF TRACEBACK <<<<<')
        pass

#groups data retrieved from CREST api
def groupData(jsonItems, regId):
    jsonItems['items'] = sorted(jsonItems['items'], key=lambda x: (x['type'], x['buy'], x['price']))

    # start multi process tasks
    executor = concurrent.futures.ProcessPoolExecutor(int(poolSize))
    futures = [executor.submit(checkID, (list(item), regId)) for key, item in groupby(jsonItems['items'], lambda x: x['type'])]
    concurrent.futures.wait(futures)

#get data from CREST api
def mineData(regId):
    # get page count to make future resilient
    resp = requests.get(base_url.format(regId))
    if resp.status_code != 200:
        raise ApiError('GET /market/{}/orders/all/ {}'.format(regId, resp.status_code))
    pageCount = resp.json()['pageCount']
    jsonItems = resp.json()

    # start loop to get all data
    for x in range(1, pageCount + 1):
	    url = '{}?page={}'.format(base_url.format(regId), x)
	    resp = requests.get(url)
	    if resp.status_code != 200:
                raise ApiError('GET {} {}'.format(url, resp.status_code))
	    jsonItems['items'] = jsonItems['items'] + resp.json()['items']
    
    #(int(), int()) use tuple for multiple key values
    jsonItems['items'] = sorted(jsonItems['items'], key=lambda k: (int(k['type']),int(k['buy']),int(k['price'])))

    #process data
    groupData(jsonItems, regId)

def getRegions():
    # setup connection for query
    cnx = dbcon.connect(user='%s' % (username), password='%s' % (password), database='%s' % (database_name))
    cursor = cnx.cursor()

    #process data
    cursor.execute(get_id)
    ids = []
    for tid in cursor:
       ids.append(str(*tid))

    # close connection
    cnx.commit()
    cursor.close()
    cnx.close()
    
    return ids

def main():
    start = time.time()
    #os.sched_setaffinity(0, {0, 1})
    logging.info('Number of cores: {}'.format(len(os.sched_getaffinity(0))))
    logging.info('Run started on: {}'.format(time.ctime(start)))
    for region in getRegions():
        logging.info('Started mining and processing: {}'.format(region))
        mineData(region)
    end = time.time()
    logging.info('Run took: {}'.format(end - start))

main()

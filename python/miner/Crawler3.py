import json
import mysql.connector as dbcon
import requests
import math
from time import sleep
import multiprocessing
import concurrent.futures
from itertools import zip_longest
import traceback
import os

# base variables
base_url='https://crest-tq.eveonline.com/market/{}/orders/{}/?type=https://crest-tq.eveonline.com/inventory/types/{}/'
username='ReadUser'
password='L3g0l4s,'
database_name='Eve Online'
add_item='INSERT INTO Data (QuantityBuy, AvgBuy, WeightedBuy, HighBuy, LowBuy, QuantitySell, AvgSell, WeightedSell, LowSell, HighSell, typeID, regionID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
get_id='SELECT ID FROM InventoryTypes'

# grouper function
def grouper(l, n):
    for i in range(0, len(l), n):
        yield l[i:i + n]

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

# data processing
def dataLoop(region, item, cursor):
    try:
        #print 'Processing: {}'.format(item)

        # get data from API and manditory sleep to remain under limit
        buyResp = requests.get(base_url.format(region, 'buy', item))
        sellResp = requests.get(base_url.format(region, 'sell', item))

        # sort json based on highest price
        buyResults = sorted(buyResp.json()['items'], key=lambda k: int(k['price']), reverse=True)
        sellResults = sorted(sellResp.json()['items'], key=lambda k: int(k['price']), reverse=False)

        buyTuple = calculate(buyResults)
        sellTuple = calculate(sellResults)
        idTuple = (item, region)

        cursor.execute(add_item, buyTuple + sellTuple + idTuple)
    except:
        print('>>>>> TRACEBACK ID: {} <<<<<'.format(item))
        print('Error encounetered during dataLoop task: ')
        traceback.print_exc()
        print('>>>>> END OF TRACEBACK <<<<<')
        pass

def processTask(item):
    try:
        # start connection
        cnx = dbcon.connect(user='%s' % (username), password='%s' % (password), database='%s' % (database_name))
        cursor = cnx.cursor()

        # main loop
        dataLoop(10000002, item, cursor)

        # close connection
        cnx.commit()
        cursor.close()
        cnx.close()
    except:
        print('error with: {}'.format(item))
        pass

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

# setup number of cores
os.sched_setaffinity(0, {0, 1, 2, 3})
print('Number of cores: {}'.format(len(os.sched_getaffinity(0))))

# start multi process tasks
executor = concurrent.futures.ProcessPoolExecutor(75)
futures = [executor.submit(processTask, item) for item in ids]
concurrent.futures.wait(futures)

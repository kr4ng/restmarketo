'''
Marketo REST API Connector

TO DO:
- Add Individual Call Wrappers
- Add 'Notices' or 'Logging' as constructor arg that causes prints or some other logging
- Enhance Marketo 'Result' value handling, research behavior
'''
__author__='Ben Johnson <ben@rightstack.io> and Steven Simoni <steven@rightstack.io>'
__version__='0.1'

import time
import requests
import json
import logging
import csv
import httplib
import gzip

class Client:
	def __init__(self, munchkin_id, client_id, client_secret):
		self.munchkin_id=munchkin_id
		self.client_id=client_id
		self.client_secret=client_secret
		self.token=None
		self.tokenExp=0
		self.version='v1'
		self.lastRequestId=None
		self.lastResponse=None
		self.lastUrlPath=None
		self.lastPayload=None
		self.nextPageToken=None
		self.lastParams=None
		self.lastType=None
		self.lastUrl=None
		
	def getToken(self):
		response=requests.get('https://'+self.munchkin_id+'.mktorest.com/identity/oauth/token',
								params={'grant_type':'client_credentials',
									    'client_id':self.client_id,
									    'client_secret':self.client_secret})
		if response.status_code==200:
			self.token=response.json()['access_token']
			self.tokenExp=time.time()+response.json()['expires_in']-30
		else:
			raise Exception(response.text)
			
	def call(self, type, urlpath, params=None, payload=None, bulk=False, files=None):
		if self.tokenExp < time.time():
			self.getToken()	
		if bulk:
			url='https://'+self.munchkin_id+'.mktorest.com/bulk/'+self.version+'/'+urlpath
			headers={'Authorization':'Bearer '+self.token}
		else:
			url='https://'+self.munchkin_id+'.mktorest.com/rest/'+self.version+'/'+urlpath	
			headers={'content-type':'application/json', 'Authorization':'Bearer '+self.token}
		if type=='get':
			response=requests.get(url, params=params, headers=headers)
		elif type=='post':
			response=requests.post(url, params=params, data=payload, headers=headers, files=files)
		else:
			raise Exception('Request Type must be "post" or "get"')
		if response.status_code==200:
			responsejson=response.json()
			self.lastUrl=str(response.url)
			self.lastRequestId=responsejson['requestId']
			self.lastUrlPath=urlpath
			self.lastParams=params
			self.lastPayload=payload
			self.lastType=type
			self.lastResponse=response.text
			if responsejson['success']:
				if 'nextPageToken' in responsejson:
					self.nextPageToken=responsejson['nextPageToken']
					more=True
				else:
					self.nextPageToken=None
					more=False
				return responsejson['result'], more
			else:
				raise Exception('Marketo Error: '+response.text)
		else:
			raise Exception('Server Error - Code '+response.status_cose+': '+response.text)
		
	def getMore(self):
		if self.lastPageToken:
			newparams=self.lastParams
			newparams['nextPageToken']=self.nextPageToken
			return self.call(self.lastType, self.lastUrlPath, params=newparams, payload=self.lastPayload)
		else:
			return False, False
			
	def createUpdateLeads(self, leads, lookup=None, action=None, partition=None):
		payload={}
		if lookup:
			payload['lookupField']=lookup
		if action:
			payload['action']=action
		if partition:
			payload['partitionName']=partition
		payload['input']=leads
		return self.call('post', 'leads.json', payload=json.dumps(payload))[0]
		
	def getLeadById(self, leadId):
		return self.call('get', 'lead/'+str(leadId)+'.json')[0]
		
	def getMultipleLeadsByFilterType(self, filtertype, filtervalues, fields=None):
		params={'filterType':filtertype,
				'filterValues':','.join(filtervalues)}
		if fields:
			params['fields']=','.join(fields)
		return self.call('get', 'leads.json', params=params)[0]

	def listimport(self, file, filetype='csv', listid=None, partitionName=None, bulk=True):
		'''
		File is the path to the csv file. FileType is csv or tsv, default to csv.
		ListId is optional
		'''
		files={'file': file}
		return self.call('post', 'leads.json', params={'format':'csv'}, bulk=bulk, files=files)
			
if __name__=='__main__':
	#client=Client('', '', '')
	#client.createUpdateLeads([{'email':'testy@testerson.org', 'firstName':'testy','lastName':'testerson'}])
	#print client.getMultipleLeadsByFilterType('email',['bjohnson@marketo.com'], fields=['email','firstName']) #, fields=['email','firstName']
	#print client.lastResponse
	#print client.lastUrl
	httplib.HTTPConnection.debuglevel = 1

	logging.basicConfig()
	logging.getLogger().setLevel(logging.DEBUG)
	requests_log = logging.getLogger("requests.packages.urllib3")
	requests_log.setLevel(logging.DEBUG)
	requests_log.propagate = True
	requests.get('http://httpbin.org/headers')

	tmpfile=open('tmp/righstack.csv', 'rU')
	client=Client('', '', '')
	client.listimport(file=tmpfile)

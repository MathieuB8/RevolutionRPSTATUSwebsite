import socket
from threading import Thread
import threading
import pyglet
import time
import datetime
import time
from datetime import datetime, date, time, timedelta
import sys, os
lastanswer = 0
nb_timeout = 0

#Send UDP packet to get number of players on server
UDP_IP = "149.56.28.211"
UDP_PORT = 30120
MESSAGE = "ffffffff676574696e666f20787878".decode('hex')

namefifi=""
todaydate=datetime.now().strftime('%d-%m-%Y %H:%M:%S')
todaydate.split(" ")
if len(todaydate) >=2:
	todaydate=todaydate.split("-")
	if len(todaydate) >=2:
		todaydate=todaydate[0]+todaydate[1]
		namefifi="/var/www/html/stats/"+todaydate+"stat120"

nblast=-2
try:
	with open(namefifi, 'r') as f:
    		lines = f.read().splitlines()
    		last_line = lines[-1]
		nblast=last_line.split("|")
		if len(nblast) >= 3:
			nblast=nblast[2]
		else:
			nblast=-2
except Exception as e:
	print "Exception><"+str(e)
	nblast=-2


file = open(namefifi,"a")
try:
	sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM) # UDP
	sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
	sock.settimeout(3)
	#Get the response and do something
	data, addr = sock.recvfrom(1024) # buffer size is 1024 bytes
        data = data.split("sv_maxclients",1)[1]
        data = data.split("clients\\")[1]
        data = data.split("\\",1)[0]
        data = int(data)
        if int(data) !=  int(nblast):
		res = "30120|"+datetime.now().strftime('%d-%m-%Y %H:%M:%S')+"|"+str(data)+"\n"
        	print "Res: "+str(res)
		print "new number!"
        	file.write(str(res))
except socket.timeout:
	print ("timeout1")
	try:
		sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM) # UDP
		sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
		sock.settimeout(3)
		data, addr = sock.recvfrom(1024) # buffer size is 1024 bytes

	        data = data.split("sv_maxclients",1)[1]
       	 	data = data.split("clients\\")[1]
		data = data.split("\\",1)[0]
        	data = int(data)
	        if int(data) != int(nblast):
			res = "30120|"+datetime.now().strftime('%d-%m-%Y %H:%M:%S')+"|"+str(data)+"\n"
        		print "Res: "+str(res)
			print "new number!"
        		file.write(str(res))
	except:
		pass
file.close()

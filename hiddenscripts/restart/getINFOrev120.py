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

file = open("/var/www/html/120.txt","w")
frest = open("/var/www/html/120sure.txt","r+")

try:
	sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM) # UDP
	sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
	sock.settimeout(2)
	#Get the response and do something
	data, addr = sock.recvfrom(1024) # buffer size is 1024 bytes
        data = data.split("sv_maxclients",1)[1]
        data = data.split("clients\\")[1]
        data = data.split("\\",1)[0]
        data = int(data)
        res = "30120|"+datetime.now().strftime('%H:%M:%S')+"|"+str(data)
        print "Res: "+str(res)
        file.write(str(res))

        if int(data) > 0 and int(data) < 5:
                lect = frest.read()
		lect = lect.replace("\n","");
                nowtime = datetime.now().strftime('%d-%m-%Y %H:%M:%S')
                if not lect: # toute premiere fois... on ecrit date
                        frest.seek(0)
			nextime = datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S') + timedelta(hours=4)
                        frest.write(str(nextime))
                else: #pas la premiere fois quon fait ce fichier
			tdelta = datetime.strptime(lect, '%Y-%m-%d %H:%M:%S') - datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S')
                        tdelta = abs(tdelta.seconds) - 4*3600
                        if abs(tdelta) > 1200: # y a plus d'une heure entre lheure lue et celle a$
				frest.seek(0)
				nextime = datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S') + timedelta(hours=4)
                               	frest.write(str(nextime))

except socket.timeout:
	print ("timeout1")
	try:
		sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM) # UDP
		sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
		sock.settimeout(2)
		data, addr = sock.recvfrom(1024) # buffer size is 1024 bytes

	        data = data.split("sv_maxclients",1)[1]
       	 	data = data.split("clients\\")[1]
		data = data.split("\\",1)[0]
        	data = int(data)
        	res = "30120|"+datetime.now().strftime('%H:%M:%S')+"|"+str(data)
        	print "Res: "+str(res)
	        file.write(str(res))

	        if int(data) > 0 and int(data) < 5:
        	        lect = frest.read()
			lect = lect.replace("\n","");
               		nowtime = datetime.now().strftime('%d-%m-%Y %H:%M:%S')
                	if not lect: # toute premiere fois... on ecrit date
                        	frest.seek(0)
				nextime = datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S') + timedelta(hours=4)
                        	frest.write(str(nextime))
                	else: #pas la premiere fois quon fait ce fichier
				tdelta = datetime.strptime(lect, '%Y-%m-%d %H:%M:%S') - datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S')
	                        tdelta = abs(tdelta.seconds) - 4*3600
                        	if abs(tdelta) > 1200: # y a plus d'une heure entre lheure lue et celle a$
					frest.seek(0)
					nextime = datetime.strptime(nowtime, '%d-%m-%Y %H:%M:%S') + timedelta(hours=4)
                               		frest.write(str(nextime))
	except:
		fi = open("/var/www/html/frestart120.txt","w")
                nextime = datetime.now()
		nextime += timedelta(hours=4)
		fi.write(str(nextime))
		fi.close()
file.close()
frest.close()

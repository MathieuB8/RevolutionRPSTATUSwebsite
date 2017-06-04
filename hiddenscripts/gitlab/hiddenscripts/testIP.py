import sys
import json
import urllib
import codecs
import re
import time
import os
import commands

nbplayersfromvisitors = 0;


name="/root/resRevo/ipt";
url="http://149.56.28.211:30120/players.json"
f = open(name,'w');
f.close();

try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		ipplayer=output[i]['endpoint'];
		iplayer=ipplayer.split(":")[0];
		res = res + playername + "|<t>|<x><|" + iplayer + "\n";
		command = "netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | grep " + iplayer + " | wc -l";
		ft = commands.getstatusoutput(command);
		if int(ft[1]) == 1:
			nbplayersfromvisitors=nbplayersfromvisitors+1;
		
	f = codecs.open(name, 'w', encoding='utf8')
	if f:
		f.write(res)
		f.close
		time.sleep(2)
except:
	print "This serv 120 down, can't get players list";


name="/root/resRevo/ipt";
url="http://149.56.28.211:30140/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		ipplayer=output[i]['endpoint'];
		iplayer=ipplayer.split(":")[0];
		res = res + playername + "|<t>|<x><|" + iplayer + "\n";
		command = "netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | grep " + iplayer + " | wc -l";
		ft = commands.getstatusoutput(command);
		if int(ft[1]) == 1:
			nbplayersfromvisitors=nbplayersfromvisitors+1;
	f = codecs.open(name, 'a', encoding='utf8')
	if f:
		f.write(res)
		f.close
		time.sleep(2)
except:
	print "This serv 140 down, can't get players list";


name="/root/resRevo/ipt";
url="http://149.56.28.211:30160/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		ipplayer=output[i]['endpoint'];
		iplayer=ipplayer.split(":")[0];
		res = res + playername + "|<t>|<x><|" + iplayer + "\n";
		command = "netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | grep " + iplayer + " | wc -l";
		ft = commands.getstatusoutput(command);
		if int(ft[1]) == 1:
			nbplayersfromvisitors=nbplayersfromvisitors+1;
	f = codecs.open(name, 'a', encoding='utf8')
	if f:
		f.write(res)
		f.close
		time.sleep(2)
except:
	print "This serv 160 down, can't get players list";


name="/root/resRevo/ipt";
url="http://149.56.28.211:30180/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		ipplayer=output[i]['endpoint'];
		iplayer=ipplayer.split(":")[0];
		res = res + playername + "|<t>|<x><|" + iplayer + "\n";
		command = "netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | grep " + iplayer + " | wc -l";
		ft = commands.getstatusoutput(command);
		if int(ft[1]) == 1:
			nbplayersfromvisitors=nbplayersfromvisitors+1;
	f = codecs.open(name, 'a', encoding='utf8')
	if f:
		f.write(res)
		f.close
		time.sleep(2)
except:
	print "This serv 180 down, can't get players list";

fa = open("/var/www/html/nbplayersfromvisitors",'w');
fa.write(str(nbplayersfromvisitors));
fa.close();

import json
import urllib
import codecs
name="/var/www/html/players120";
url="http://149.56.28.211:30120/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		#playername = playername.split("u")[0];
		res = res + playername + "\n"; 
	f = codecs.open(name, 'w', encoding='utf8')
	if f:
		f.write(res)
		f.close
except:
	print "This serv 120 down, can't get players list";
	f = open(name,'w');
	f.close();

name="/var/www/html/players140";
url="http://149.56.28.211:30140/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		#playername = playername.split("u")[0];
		res = res + playername + "\n"; 
	f = codecs.open(name, 'w', encoding='utf8')
	if f:
		f.write(res)
		f.close
except:
	print "This serv 140 down, can't get players list";
	f = open(name,'w');
	f.close();



name="/var/www/html/players160";
url="http://149.56.28.211:30160/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		#playername = playername.split("u")[0];
		res = res + playername + "\n"; 
	f = codecs.open(name, 'w', encoding='utf8')
	if f:
		f.write(res)
		f.close
except:
	print "This serv 160 down, can't get players list";
	f = open(name,'w');
	f.close();


name="/var/www/html/players180";
url="http://149.56.28.211:30180/players.json"
try:
	output = json.load(urllib.urlopen(url))
	res = "";
	for i in range(len(output)):
		playername=output[i]['name'];
		#playername = playername.split("u")[0];
		res = res + playername + "\n"; 
	f = codecs.open(name, 'w', encoding='utf8')
	if f:
		f.write(res)
		f.close
except:
	print "This serv 180 down, can't get players list";
	f = open(name,'w');
	f.close();



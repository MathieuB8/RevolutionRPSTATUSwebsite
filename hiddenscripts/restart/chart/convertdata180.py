
import datetime
import time
from datetime import datetime, date, time, timedelta

namefifi=""
todaydate=datetime.now().strftime('%d-%m-%Y %H:%M:%S')
todaydate.split(" ")
if len(todaydate) >=2:
        todaydate=todaydate.split("-")
        if len(todaydate) >=2:
                todaydate=todaydate[0]+todaydate[1]
                namefifi="/var/www/html/stats/"+todaydate+"stat180"

f = open(namefifi,"r")
fi = open("nicedata180","w")
date=[]
nb=[]
for line in f:
	res=line.split("|")
	if (len(res)>=2):
		#print "heyyy"+str(len(res))
		#res[2] =  res[2].replace("\n","");
		datefix = res[1]
		datefix = datefix.split(" ")
		if len(datefix) ==2:
			datefix=datefix[1]
		else:
			datefix=datefix[0]
		date.append(datefix)
		nb.append(res[2])
		data=datefix+" "+res[2];
		fi.write(data);

print "convertdata of stat180"

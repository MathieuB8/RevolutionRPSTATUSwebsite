#!/bin/sh
naowdate=$(date +"%Y-%m-%d %T");
echo "\n\n\n>>>>>>>\n>>>>>script started at $naowdate";
data=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "SELECT globaltime/60,time/60,name from timespent where globaltime > 0 ORDER BY globaltime DESC");

if [ -z "$data" ];then #no data in the second db, so need to create the first one
	echo "empty, wut ? big bug";
else #data about this player in the second db
    	echo "Found data";
	#echo "$data";
	gtime=`echo "$data" | cut -d'	' -f1` #en minutes
	restartime=`echo "$data" | cut -d'	' -f2` #en minutes
	steamname=`echo "$data" | cut -d'	' -f3-`
	echo "$gtime" > /var/www/html/Agtime;
	echo "$restartime" > /var/www/html/Arestartime;
	echo "$steamname" > /var/www/html/Asteamname;
fi

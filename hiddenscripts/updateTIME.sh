#!/bin/sh
today=`echo $(date) | cut -d " " -f4`
hour=`echo $today | cut -d ":" -f1`
min=`echo $today | cut -d ":" -f2`


res140=`cat /var/www/html/players140`
res120=`cat /var/www/html/players120`
res160=`cat /var/www/html/players160`
res180=`cat /var/www/html/players180`
resbef=`cat /var/www/html/playersALLbef`
echo "$res120" >  /var/www/html/playersALLnow;
echo "$res140" >> /var/www/html/playersALLnow;
echo "$res160" >> /var/www/html/playersALLnow;
echo "$res180" >> /var/www/html/playersALLnow;
resall=`cat /var/www/html/playersALLnow`

fifi="/var/www/html/playersALLbef"
naowdate=$(date +"%Y-%m-%d %T");
echo "\n\n\n>>>>>>>\n>>>>>script started at $naowdate";
while IFS="\n" read -r line
do
	echo -n "======================================\n============================lineeee $line";
	if [ `echo $resall | fgrep -c "$line" ` -gt 0 ]
	then # he is still playing on server
		line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`
		echo "[||after:$line||]]";
        	myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select * from playerINFO m JOIN timespent t ON t.ID = m.ID where name='$line'")
       		id=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select ID from timespent where name='$line'");
		echo "His ID: $id";

		if [ -z "$id" ];then #the guy has no id in the db, we should fix it, shouldn't happen but whatever
			echo "Has no id in the db, going to add him in timespent";
                        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES('$line','0','0')";
		fi
		if [ -z "$myvar" ];then #no data in the second db, so need to create the first one
			echo "has no data in second db, going to create it with a startime";		
	       		id=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select ID from timespent where name='$line'");
			echo "ID est  $id à $naowdate"
			mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO playerINFO (ID,startime) VALUES('$id','$naowdate')";
		else #data about this player in the second db
	        	echo "has data in second db";
	       		id=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select ID from timespent where name='$line'");
			myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select * from playerINFO m JOIN timespent t ON t.ID = m.ID where name='$line' and startime is not NULL and endtime is NULL")
			if [ -z "$myvar" ];then #deuxieme if wut
				myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select * from playerINFO m JOIN timespent t ON t.ID = m.ID where name='$line' and startime is NULL")
				echo "myvar is >>$myvar<<";
				if [ -z "$myvar" ];then 
					#he has no starttime for now, he needs one so let's give him one
					echo "He has no start time, going to give him one with id $id at $naowdate";
					mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO playerINFO (ID,startime) VALUES('$id','$naowdate')";
					#if he has a startime, nothing to do it's already ready
				else
					echo "useless type";
					zamwpa=2; #uselessline but just to avoid error
				fi


			else # he has no startime, add it!
				dksqopdq=23; #nothing to do he has a startime not null, dont need to add another startime

			fi
		fi
	else # he left a server!! We need to add the endate
                line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`
        	id=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select ID from timespent where name='$line'");
	        myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select * from playerINFO m JOIN timespent t ON t.ID = m.ID where name='$line' and startime is not NULL and endtime is NULL")
		echo "LEAVER >>>$line<<< with ID $id|";
		if [ -z "$myvar" ];then
			# he left but he has no startime, wut, do you even logic bro? ?? ? 
			echo "WTF THIS CASE IT SHOULDNT HAPPEN";
			echo "WTF THIS CASE IT SHOULDNT HAPPEN" >> ~/resRevo/WTFTHISCASEWHY; 
		else #he has a start ime but no endtime and he left so let's update it
  	        	echo "start time he has,  but no endtime, for id $id so going to update for endtime $naowdate";
			mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE playerINFO SET endtime='$naowdate' where ID='$id' and startime is not NULL and endtime is NULL";
		fi
	fi
done <"$fifi"

echo "$resall" > /var/www/html/playersALLbef;


#echo "\n=========FIN CANCER SCRIPT==========\n";


file="/var/www/html/players120"
while IFS= read -r line
do
        # display $line or do somthing with $line
	#printf '%s\n' "$line"
        line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`

	myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select time from timespent where name='$line'")
	myvar2=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select globaltime from timespent where name='$line'")

	if [ -z != $myvar ]
	then
	myvar=$(($myvar+60))
	myvar2=$(($myvar2+60))
	mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
	else
	myvar=20
	mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
	fi
done <"$file"


file="/var/www/html/players140"
while IFS= read -r line
do
        line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`

        # display $line or do somthing with $line
        #printf '%s\n' "$line"
        myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select time from timespent where name='$line'")
        myvar2=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select globaltime from timespent where name='$line'")

        if [ -z != $myvar ]
        then
        myvar=$(($myvar+60))
        myvar2=$(($myvar2+60))
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
        else
        myvar=20
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
        fi
done <"$file"


file="/var/www/html/players160"
while IFS= read -r line
do
        line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`

        #printf '%s\n' "$line"
        myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select time from timespent where name='$line'")
        myvar2=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select globaltime from timespent where name='$line'")

        if [ -z != $myvar ]
        then
        myvar=$(($myvar+60))
        myvar2=$(($myvar2+60))
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
        else
        myvar=20
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
        fi
done <"$file"



file="/var/www/html/players180"
while IFS= read -r line
do
        line=`echo $line| tr --delete []\\\/\;\'ツ✪♥♕`

        #printf '%s\n' "$line"
        myvar=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select time from timespent where name='$line'")
        myvar2=$(mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "select globaltime from timespent where name='$line'")

        if [ -z != $myvar ]
        then
        myvar=$(($myvar+60))
        myvar2=$(($myvar2+60))
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
        else
        myvar=20
        mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
        fi
done <"$file"




#echo "=======\n"
#player=`echo $res120 | cut -d'|' -f1 `
#echo "today>$today"
#echo "hour>$hour"
#echo "min>$min"

if [ $hour -eq 3 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 7 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 11 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 15 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 19 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 23 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --defaults-extra-file=~/resRevo/DBsensitive/config.cnf  Revolution -se "UPDATE timespent SET time=0"
fi














#mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution << EOF
#myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select * from timespent")
#echo myvar
#INSERT INTO timespent (id, port, date, number) VALUES (NULL, "$port", "$date", "$res");
#EOF

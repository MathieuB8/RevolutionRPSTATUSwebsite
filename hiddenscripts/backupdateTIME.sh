#!/bin/sh
today=`echo $(date) | cut -d " " -f4`
hour=`echo $today | cut -d ":" -f1`
min=`echo $today | cut -d ":" -f2`


res140=`cat /var/www/html/players140`
res120=`cat /var/www/html/players120`
res160=`cat /var/www/html/players160`
resbef=`cat /var/www/html/playersALLbef`
echo "$res120" >  /var/www/html/playersALLnow;
echo "$res140" >> /var/www/html/playersALLnow;
echo "$res160" >> /var/www/html/playersALLnow;
resall=`cat /var/www/html/playersALLnow`

fifi="/var/www/html/playersALLbef"
while IFS="\n" read -r line
do
	if [ `echo $resall | fgrep -c "$line" ` -gt 0 ]
	then # he is still playing on server
		#echo "Success with $line";
        	myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select * from playerINFO m JOIN timespent t ON t.id = m.id where name='$line'")
		if [ -z $myvar ];then #no data in the second db, so need to create the first one
			#echo " empty>>myvar vaut $myvar";
	       		id=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select id from timespent where name='$line'");
			naowdate=$(date +"%Y-%m-%d %T");
			mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO playerINFO (id,startime) VALUES('$id','$naowdate')";
		else #data about this player in the second db
			echo "not empty!!$myvar";	
	        	myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select * from playerINFO m JOIN timespent t ON t.id = m.id where name='$line' and startime is NULL")
			if [ -z $myvar];then #he has no starttime for now, he needs one so let's give him one
				naowdate=$(date +"%Y-%m-%d %T");
				mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO playerINFO (id,startime) VALUES('$id','$naowdate')";
			#if he has a startime, nothing to do it's already ready
			fi
		fi
	else # he left a server!! We need to add the endate
		echo "FAIL with |>$line<|";
	        myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select * from playerINFO m JOIN timespent t ON t.id = m.id where name='$line' and startime is not NULL and endtime is nULL")
		if [ -z != $myvar ];then # he has a start time but no endtime and he left, so let's update it!
  	        	id=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select id from timespent where name='$line'");
			naowdate=$(date +"%Y-%m-%d %T");
  	        	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET endtime=$naowdate where id='$id' and startime is not NULL and endtime is NULL";
		else # he left but he has no startime, wut, do you even logic bro? ?? ? 
			echo "WTF THIS CASE IT SHOULDNT HAPPEN";
			echo "WTF THIS CASE IT SHOULDNT HAPPEN" >> ~/resRevo/WTFTHISCASEWHY; 
		fi
	fi
        #myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select time from timespent where name='$line'")
        #myvar2=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select globaltime from timespent where name='$line'")

       # if [ -z != $myvar ]
       # then
       # myvar=$(($myvar+60))
       # myvar2=$(($myvar2+60))
       # mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
       # else
       # myvar=20
       # mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
       # fi
done <"$fifi"

echo "$resall" > /var/www/html/playersALLbef;





file="/var/www/html/players120"
while IFS= read -r line
do
        # display $line or do somthing with $line
	#printf '%s\n' "$line"
	myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select time from timespent where name='$line'")
	myvar2=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select globaltime from timespent where name='$line'")

	if [ -z != $myvar ]
	then
	myvar=$(($myvar+60))
	myvar2=$(($myvar2+60))
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
	else
	myvar=20
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
	fi
done <"$file"

file="/var/www/html/players140"
while IFS= read -r line
do
        # display $line or do somthing with $line
	#printf '%s\n' "$line"
	myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select time from timespent where name='$line'")
	myvar2=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select globaltime from timespent where name='$line'")

	if [ -z != $myvar ]
	then
	myvar=$(($myvar+60))
	myvar2=$(($myvar2+60))
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
	else
	myvar=20
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
	fi
done <"$file"

file="/var/www/html/players160"
while IFS= read -r line
do
        # display $line or do somthing with $line
	#printf '%s\n' "$line"
	myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select time from timespent where name='$line'")
	myvar2=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select globaltime from timespent where name='$line'")

	if [ -z != $myvar ]
	then
	myvar=$(($myvar+60))
	myvar2=$(($myvar2+60))
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=$myvar,globaltime=$myvar2 where name='$line'"
	else
	myvar=20
	mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "INSERT INTO timespent (name,time,globaltime) VALUES ('$line','$myvar','$myvar')"
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
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 7 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 11 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 15 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 19 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi
if [ $hour -eq 23 ] && [ $min -eq 0 ];
then
echo "clean timespent"
mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "UPDATE timespent SET time=0"
fi














#mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution << EOF
#myvar=$(mysql --user=rev --password="JDIOQS239àç@$ù&" Revolution -se "select * from timespent")
#echo myvar
#INSERT INTO timespent (id, port, date, number) VALUES (NULL, "$port", "$date", "$res");
#EOF

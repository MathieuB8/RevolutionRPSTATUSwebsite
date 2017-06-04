#!/bin/bash

while true
do
	numbervisitors=`netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -n | grep -v Address | grep -v "servers)" | wc -l`

	nbcheck='^[0-9]+$';
	if [[ $numbervisitors =~ $nbcheck ]] ; then
		echo $numbervisitors > /var/www/html/nbvisitors
	else
		echo "ERR" > /var/www/html/nbvisitors
	fi
        sleep 60
done

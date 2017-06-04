#!/bin/sh
while true
do
	naowdate=$(date +"%Y-%m-%d %T");
	echo "$naowdate";
	python ~/resRevo/playersWHITELISTED.py 
	sleep 30
done

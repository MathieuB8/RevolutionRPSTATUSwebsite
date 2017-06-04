#!/bin/sh
while true
do
	echo "graph sh"
        python ~/resRevo/restart/chart/convertdata120.py
	./graph120

        python ~/resRevo/restart/chart/convertdata140.py
	./graph140

        python ~/resRevo/restart/chart/convertdata160.py
	./graph160

        python ~/resRevo/restart/chart/convertdata180.py
	./graph180
        sleep 10
done

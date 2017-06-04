name="/var/www/html/players180";
name2="/var/www/html/listofwhitelisted";
#doesn't work if someone didn't play for a long time
print "List of whitelisted citizens...";
with open(name) as file:
	arr_content = file.readlines()
	for eachline in arr_content:
		foundit=0;
		with open(name2,'r+') as file2:
			arr_content2 = file2.readlines()
			for eachline2 in arr_content2:
				#print "each:"+eachline+"|||:"+eachline2;
				if eachline2==eachline:
					foundit=1;
				else:
					tmpmp=23;
		if foundit==0:
	                with open(name2,'a') as file3:
				file3.write(eachline);

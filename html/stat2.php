
<!DOCTYPE html>

<title>Rev RP servers status</title>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">


<style type="text/css">
  .highlight {color: red}
  .highlight2 {color: orange}
  .highlight3 {color:#009999;}
  .highlight4 {color: blue}
  .highlight5 { color: #e6b800; }
  .titlebig { font-size:130%; color: #5e2bd5; font-weight: bold; }
.Row
{
    display: table;
    width: 100%;
    table-layout: fixed;
    border-spacing: 10px;
}
.Column
{
    display: table-cell;
    width: -moz-max-content;
}
table.center 
{
margin-left:auto;
margin-right:auto;
}
</style>
  </head>

  <body>
<span class="highlight">
<?php

echo "In test, data may be reset if any error is made doing these stats";
?>
</span>

            <div class="inner">
<span class="highlight3">
		<br>To read it, it is the time (time left) in the format hours:minutes:seconds
   		<br><a href="index.php">Back to main page, click me</a><br><br>

Stats started to get retrieved from 2017-05-28 at 21:53:13 (so the total playtime starts at this date)<br>
Update every 10 minutes
</span><?php
echo '<table class="center" border="1">';
$ftime = fopen("Agtime", "r") or die("Unable to open file!");
$fname = fopen("Asteamname", "r") or die("Unable to open file!");
$ftime2 = fopen("Arestartime", "r") or die("Unable to open file!");

echo "<tr><td>Steam name</td><td>Total playtime</td><td>Playtime since last restart</td></tr>";
while (!feof($ftime)){
	feof($fname);
	feof($ftime2);
	$data=fgets($fname);

	$data1=fgets($ftime);
	$hour=floor($data1/60);
	$minutes=floor($data1-$hour*60);
	
	echo "<tr><td>".$data.'</td>';
	echo "<td>".$hour.":".$minutes.":"."00".'</td>';
	$data2=fgets($ftime2);
	$hour=floor($data2/60);
	$minutes=floor($data2-$hour*60);
	echo "<td>".$hour.":".$minutes.":00".'</td></tr>';
}
echo '</table>';
fclose($ftime);
fclose($fname);
?>







 
		<span class="highlight3">
              <p>Unofficial website made by <a href="contact.php">Masamune</a>  for <a 
href="https://forums.rmog.us/"> Revolution RP servers</a><br>
              <p>Back to main page: <a href="index.php">Click me</a><br>
            </p></div></span>


        </div>


    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

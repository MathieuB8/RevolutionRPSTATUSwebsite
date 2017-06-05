<!DOCTYPE html>

<title>Rev RP servers status</title>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="refresh" content="11" > 
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">


<style type="text/css">
  .smally { color:orange;font-size:75%;}
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

</style>
  </head>

  <body>
<?php
echo "Restart time of all servers(it doesn't change, even in crash/updates)<br>";
?>
<span class="highlight2">


<?php
$nowdate=date("d-m-Y H:i:s");
$y = explode("-",$nowdate);
$y = $y[2];
$y = explode(" ",$y);
$y = $y[0];
$m = explode("-",$nowdate);
$m = $m[1];
$d = explode("-",$nowdate);
$d = $d[0];
$time=explode(" ",$nowdate)[1];
$hour = explode(":",$time);
$hour =$hour[0];
$min = explode(":",$time);
$min = $min[1];
$sec = explode(":",$time);
$sec = $sec[2];
$nowdate = strtotime(date("d-m-Y H:i:s"));
if($hour>18 and $hour<23){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."23:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
	$res=$d."-".$m."-".$y." "."16:00:00";
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
}
if($hour>22 and $hour<25){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."24:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2)+3*60;
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	$res=($d+1)."-".$m."-".$y." "."03:00:00";
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }

	?><span class="highlight"><br>(CST) </span><?php
	$res=$d."-".$m."-".$y." "."20:00:00";
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }

}
if($hour>-1 and $hour<3){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."03:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
	$res=($d-1)."-".$m."-".$y." "."20:00:00";
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
}
if($hour>2 and $hour<7){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."07:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
        $res=$d."-".$m."-".$y." "."00:00:00";
        print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
}
if($hour>6 and $hour<11){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."11:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
        $res=$d."-".$m."-".$y." "."04:00:00";
        print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }

}
if($hour>10 and $hour<15){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."15:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
        $res=$d."-".$m."-".$y." "."08:00:00";
        print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }

}
if($hour>14 and $hour<19){
	?><span class="highlight">(GMT+2) </span><?php
	$res=$d."-".$m."-".$y." "."19:00:00";
	$restartplanned=strtotime($res);
	$time=round(($restartplanned-$nowdate)/60,2);
        $hours = floor($time/60);
        $minutes = floor($time - $hours*60);
        $seconds = round((($time-floor($time))*100)*60/100,0);
	print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
	?><span class="highlight"><br>(CST) </span><?php
	$res=$d."-".$m."-".$y." "."12:00:00";
        print $res;
        if ($seconds < 10 and $seconds > -1){
                    echo "(".$hours.":".$minutes.":0".$seconds." left)";
        }else{
                    echo "(".$hours.":".$minutes.":".$seconds." left)";
        }
}
?>

</span>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              </nav>
            </div>
          </div>

<a href="https://forums.rmog.us/topic/5889-going-to-close-website-revolution-status-in-2-weeks-max-need-someone-to-take-my-role/"><span class="highlight">Go there for information, website will be down at June 18th max, need someone</a><br></span>
<span class="highlight3">
<?php
$nbvisitors = file_get_contents('nbvisitors');
if ($nbvisitors == NULL){
	sleep(1);
	$nbvisitors = file_get_contents('nbvisitors');
}

$nbonline = file_get_contents('nbplayersfromvisitors');
if ($nbonline == NULL){
	sleep(1);
	$nbonline = file_get_contents('nbplayersfromvisitors');
}

if ($nbvisitors != NULL){
	if (is_numeric(intval($nbvisitors))){
		echo intval($nbvisitors);
		echo " visitors on the website ";
	}
}
if ($nbonline != NULL){
	if (is_numeric(intval($nbonline))){
		echo "(";
		echo intval($nbonline);
		echo " of them are playing on the servers)";
	}
}
echo "<br>To read it, it is the time (time left) in the format hours:minutes:seconds";
echo "<br>In front of the name, it's the time played since last restart(hour:min:sec)";

?>
<br><a href="stat2.php">Click me to go to stat1</a> |||| <a href="stat.php">Click me to go to stat2</a>
<br><a href="addmeistream.php"><img src="twitch.png">Streamer and want to be added on the website?(81 added) click me.</a><br><br>
<span class="highlight">
<br> <br>
</span>
</span>
<?php
$nbplayers = file_get_contents('180.txt');

if ($nbplayers == NULL){
	sleep(1);
	$nbplayers = file_get_contents('180.txt');
}

$time=explode("|",$nbplayers);
if ($time != NULL and count($time) >=2){
	$time=$time[1];
}else{
	$time="err";
}

$res=explode("|",$nbplayers);
if ($res != NULL and count($res)>=3){
	$res=$res[2];
}else{
	$res="err";
}


?>
<div class="Row">
<div class="Column">
<span class="titlebig">
<?php
echo "Whitelisted 1<br>";




$listofwhitelisted = file_get_contents('listofwhitelisted');
if ($listofwhitelisted == NULL){
        sleep(1);
        $listofwhitelisted = file_get_contents('listofwhitelisted');
}
?>
</span>
<a href="https://forums.rmog.us/topic/6371-whitelisted-server-now-available/#comment-26046" class="highlight3">Click me for info</a><br>
<button onclick="myFunction()">List of the whitelisted</button><br>
<script type="text/javascript">
var listphp = <?php echo json_encode($listofwhitelisted); ?>;
msgphp="NOT 100% ACCURATE\nHere is the list of the whitelisted citizens, not official, and if someone is removed from whitelisted, won't update the list. A citizen will be added on this list once he joins the server.So It will take some time before it's accurate enough\n\n";
var listphp = msgphp.concat(listphp);
function myFunction() {
    alert(listphp);
}
</script>

<span class="highlight3">
<?php
echo $res;
?>
</span>
<?php
echo " players online";
echo "<br>" . $time . "(last checked time)<br>";

if ($res >= 0 and $res != "err"){
	?>
<h3 style="color:#00ff00;">UP</h3>
	<?php
	}
else{
?>
<h3 style="color:#ff0066;">DOWN</h3>
<?php
}
?>
<span class="highlight5">
<?php
echo "List of online players<br>";
?>
</span>
<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=Revolution;charset=utf8', 'rev', 'JDIOQS239àç@$ù&');
}catch (Exception $e){
	die('Error...Report it to forum plz. ERRCODE6901234');
}
if (file_exists('players180')){
	$tmplist = file_get_contents('players180');
	$playerslist = explode ("\n",$tmplist);
	for ($i=0;$i<count($playerslist);$i++){
		if($playerslist[$i] == '') { continue; }
		$twitchfound=0;
		$resul='';
			try{
			$req=$bdd->prepare('SELECT time FROM timespent WHERE name = :stname ');
			$req->execute(array('stname' => $playerslist[$i]));
			while ($donnees=$req->fetch()){
				$tmpttemp=$donnees['time'];
				$mins=floor(($tmpttemp/60 % 60));
				$hours=floor(($tmpttemp/60 - $mins)/60);
				$resul="(".$hours.":".$mins.":00) ";
			}
			}catch (Exception $e){
        			die('Error: Report it to forum plz, ERRCODE6909876');
			}
			$req->closeCursor();



		$file=fopen('streamersverified.txt','r');
    		if (!$file)
        		die('file does not exist or cannot be opened');
		while (($line = fgets($file)) !== false) {
			$line = explode("<>||;;||<>",$line);
			if ($line[0] == $playerslist[$i]){
				?>

				<span class="smally"><?php echo $resul; ?> </span>
				<a href="<?php echo $line[1]; ?>">
				<span class="highlight3">
				<img src="twitch.png">
				<?php echo $playerslist[$i];?>
				</a></span>
				<?php
				$twitchfound=1;
				break;
			}
    		}
		if ($twitchfound == 0){
			?><span class="smally"><?php echo $resul; ?> </span>
			<?php echo $playerslist[$i];
		}
		fclose($file);
		echo "<br>";
	}
}







?>
</div><div class="Column"><span class="titlebig">
<?php
echo "Server 1 (30120)<br>";
?>
</span>
<?php
$nbplayers = file_get_contents('120.txt');


if ($nbplayers == NULL){
	sleep(1);
	$nbplayers = file_get_contents('120.txt');
}

$time=explode("|",$nbplayers);
if ($time != NULL and count($time) >=2){
	$time=$time[1];
}else{
	$time="err";
}

$res=explode("|",$nbplayers);
if ($res != NULL and count($res)>=3){
	$res=$res[2];
}else{
	$res="err";
}
?>
<span class="highlight3">
<?php
echo $res;
?>
</span>
<?php
echo " players online";
echo "<br>" . $time . "(last checked time)<br>";

if ($res >= 0 and $res !="err"){
	?>
<h3 style="color:#00ff00;">UP</h3>
	<?php
	}
else{
?>
<h3 style="color:#ff0066;">DOWN</h3>
<?php
}
?>
<span class="highlight5">
<?php
echo "List of online players<br>";
?>
</span>
<?php
if (file_exists('players120')){
	$tmplist = file_get_contents('players120');
	$playerslist = explode ("\n",$tmplist);
	for ($i=0;$i<count($playerslist);$i++){
		if($playerslist[$i] == '') { continue; }
		$twitchfound=0;
		$resul='';
			try{
			$req=$bdd->prepare('SELECT time FROM timespent WHERE name = :stname ');
			$req->execute(array('stname' => $playerslist[$i]));
			while ($donnees=$req->fetch()){
				$tmpttemp=$donnees['time'];
				$mins=floor(($tmpttemp/60 % 60));
				$hours=floor(($tmpttemp/60 - $mins)/60);
				$resul="(".$hours.":".$mins.":00) ";
			}
			}catch (Exception $e){
        			die('Error:Report it to forum plz, ERRCODE690565656');
			}
			$req->closeCursor();



		$file=fopen('streamersverified.txt','r');
    		if (!$file)
        		die('file does not exist or cannot be opened');
		while (($line = fgets($file)) !== false) {
			$line = explode("<>||;;||<>",$line);
			if ($line[0] == $playerslist[$i]){
				?>

				<span class="smally"><?php echo $resul; ?> </span>
				<a href="<?php echo $line[1]; ?>">
				<span class="highlight3">
				<img src="twitch.png">
				<?php echo $playerslist[$i];?>
				</a></span>
				<?php
				$twitchfound=1;
				break;
			}
    		}
		if ($twitchfound == 0){
			?><span class="smally"><?php echo $resul; ?> </span>
			<?php echo $playerslist[$i];
		}
		fclose($file);
		echo "<br>";
	}
}
?>
</div><div class="Column"><span class="titlebig">
<?php
echo "Server 2 (30140)<br>";
?>
</span>
<?php
$nbplayers = file_get_contents('140.txt');


if ($nbplayers == NULL){
	sleep(1);
	$nbplayers = file_get_contents('140.txt');
}

$time=explode("|",$nbplayers);
if ($time != NULL and count($time) >=2){
	$time=$time[1];
}else{
	$time="err";
}

$res=explode("|",$nbplayers);
if ($res != NULL and count($res)>=3){
	$res=$res[2];
}else{
	$res="err";
}
?>
<span class="highlight3">
<?php
echo $res;
?>
</span>
<?php
echo " players online";
echo "<br>" . $time . "(last checked time)<br>";

if ($res >= 0 and $res !="err"){
	?>
<h3 style="color:#00ff00;">UP</h3>
	<?php
	}
else{
?>
<h3 style="color:#ff0066;">DOWN</h3>
<?php
}
?>
<span class="highlight5">
<?php
echo "List of online players<br>";
?>
</span>
<?php
if (file_exists('players140')){
	$tmplist = file_get_contents('players140');
	$playerslist = explode ("\n",$tmplist);
	for ($i=0;$i<count($playerslist);$i++){
		if($playerslist[$i] == '') { continue; }
		$twitchfound=0;
		$resul='';
			try{
			$req=$bdd->prepare('SELECT time FROM timespent WHERE name = :stname ');
			$req->execute(array('stname' => $playerslist[$i]));
			while ($donnees=$req->fetch()){
				$tmpttemp=$donnees['time'];
				$mins=floor(($tmpttemp/60 % 60));
				$hours=floor(($tmpttemp/60 - $mins)/60);
				$resul="(".$hours.":".$mins.":00) ";
			}
			}catch (Exception $e){
        			die('Error:Report it to forum plz, ERRCODE690565656');
			}
			$req->closeCursor();



		$file=fopen('streamersverified.txt','r');
    		if (!$file)
        		die('file does not exist or cannot be opened');
		while (($line = fgets($file)) !== false) {
			$line = explode("<>||;;||<>",$line);
			if ($line[0] == $playerslist[$i]){
				?>

				<span class="smally"><?php echo $resul; ?> </span>
				<a href="<?php echo $line[1]; ?>">
				<span class="highlight3">
				<img src="twitch.png">
				<?php echo $playerslist[$i];?>
				</a></span>
				<?php
				$twitchfound=1;
				break;
			}
    		}
		if ($twitchfound == 0){
			?><span class="smally"><?php echo $resul; ?> </span>
			<?php echo $playerslist[$i];
		}
		fclose($file);
		echo "<br>";
	}
}
?>















</div>
<div class="Column"><span class="titlebig">
<?php
echo "Server 3 (30160)<br>";
?>
</span><?php
$nbplayers = file_get_contents('160.txt');

if ($nbplayers == NULL){
	sleep(1);
	$nbplayers = file_get_contents('160.txt');
}


$time=explode("|",$nbplayers);
if ($time != NULL and count($time) >=2){
	$time=$time[1];
}else{
	$time="err";
}

$res=explode("|",$nbplayers);
if ($res != NULL and count($res)>=3){
	$res=$res[2];
}else{
	$res="err";
}
?>
<span class="highlight3">
<?php
echo $res;
?>
</span>
<?php
echo " players online";


echo "<br>" . $time . "(last checked time)<br>";
if ($res >= 0 and $res !="err"){
        	?>
		<h3 style="color:#00ff00;">UP</h3>
        	<?php
}else{
?>
	<h3 style="color:#ff0066;">DOWN</h3>
<?php
}
?>
<span class="highlight5">
<?php
echo "List of online players<br>";
?>
</span>
<?php
if (file_exists('players160')){
	$tmplist = file_get_contents('players160');
	$playerslist = explode ("\n",$tmplist);
	for ($i=0;$i<count($playerslist);$i++){
		if($playerslist[$i] == '') { continue; }
		$twitchfound=0;
		$resul='';
			try{
			$req=$bdd->prepare('SELECT time FROM timespent WHERE name = :stname ');
			$req->execute(array('stname' => $playerslist[$i]));
			while ($donnees=$req->fetch()){
				$tmpttemp=$donnees['time'];
				$mins=floor(($tmpttemp/60 % 60));
				$hours=floor(($tmpttemp/60 - $mins)/60);
				$resul="(".$hours.":".$mins.":00) ";
			}
			}catch (Exception $e){
        			die('Error:Report it to forum plz, ERRCODE 69088888');
			}
			$req->closeCursor();



		$file=fopen('streamersverified.txt','r');
    		if (!$file)
        		die('file does not exist or cannot be opened');
		while (($line = fgets($file)) !== false) {
			$line = explode("<>||;;||<>",$line);
			if ($line[0] == $playerslist[$i]){
				?>

				<span class="smally"><?php echo $resul; ?> </span>
				<a href="<?php echo $line[1]; ?>">
				<span class="highlight3">
				<img src="twitch.png">
				<?php echo $playerslist[$i];?>
				</a></span>
				<?php
				$twitchfound=1;
				break;
			}
    		}
		if ($twitchfound == 0){
			?><span class="smally"><?php echo $resul; ?> </span>
			<?php echo $playerslist[$i];
		}
		fclose($file);
		echo "<br>";
	}
}
?>

</div></div>
		<span class="highlight3">
              <p>Unofficial website made by <a href="https://forums.rmog.us/profile/6738-matt-bell/">Masamune</a>  for <a 
href="https://forums.rmog.us/"> Revolution RP servers</a><br>
Update every 1 minute, no need to refresh. <br>
WIP not 100% accurate, especially for restart time.<br>
If lost with timezone GMT +2 used, use google or that >> Date now : <?php echo date("H:i:s");?><br>
Updates and information about this website <a href="https://forums.rmog.us/topic/5889-revolution-status-website/">here</a>
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

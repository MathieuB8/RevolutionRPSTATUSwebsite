
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
    <link href="coverIMG.css" rel="stylesheet">


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

</style>
  </head>

  <body>

<?php
$steamname=$link=$linkErr=$steamnameErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["steamname"])) {
    $steamnameErr = "exact steam name is required";
  } else {
	$steamname = test_input($_POST["steamname"]);
  }
  if (empty($_POST["link"])) {
  	$linkErr = "link is required";
  } else {
		$link = test_input($_POST["link"]);
  		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link)) {
  		$linkErr = "Invalid URL (example : https://www.twitch.tv/yourname)";
  		}
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo "Welcome streamer and thanks you";
?>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              </nav>
            </div>
          </div>
<br>
<br>
<h4><br>Enter your information to be added to the website :<br></h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Exact STEAM name(/!\case sensitive/!\): <input type="text" name="steamname">
  <span class="highlight">* <?php echo $steamnameErr;?></span>
  <br><br>
  Full twitch link: <input type="text" name="link">
  
<span class="highlight">* <?php echo $linkErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<?php
if ( empty($linkErr) and empty($steamnameErr) and isset($link) and isset($steamname) and !empty($link) and !empty($steamname) ){
	echo "You can leave now, it usually takes 1 day max to be added. If not added, write a post in the forum";
	?>
	<a href="https://forums.rmog.us/topic/5889-revolution-status-website/">here, click me</a><br><br>
	<?php $data=$steamname."<>||;;||<>".$link."\n";
	$txt = "streamertoverify.txt"; 
	$fh = fopen($txt, 'a+');
	$reto = file_put_contents($txt,$data,FILE_APPEND | LOCK_EX);	
	if ($reto == false){
		echo "Error, try again, if  not working, contact the webmaster\n";
	}
}
?>

</div></div>


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

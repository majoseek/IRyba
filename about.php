<?php
session_start();
if(isset($_GET['logout'])==1)
{
	session_unset();
}
if(!(isset($_SESSION['logged'])==1))
{
	header("Location: index.php");
	die();
}
$login=$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="icon" href="images/about-us.png">
	<link rel="stylesheet" type="text/css" href="styles/home_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400i&display=swap" rel="stylesheet">
</head>
<body>
	<div id="tlo"></div>
	<h1 style="position: absolute;top:30%;left:20%;white-space: nowrap; color: white;">Brak pomyslu na wstawienie czegokolwiek ;(</h1>
	<img id="koleszka" src="images/koleszka.png">
<div id="menu">
		<button class="przycisk" onclick="home_click(); return false;">HOME</button>
		<button class="przycisk" onclick="cloud_click(); return false;">CLOUD</button>
		<button class="przycisk" onclick="account_click(); return false;">ACCOUNT</button>
		<button class="przycisk" onclick="about_click(); return false;" style="background-color: rgba(50, 211, 120, 0.9);">ABOUT</button>
		<button id="wyloguj_btn" class="przycisk" onclick="log_out();">LOG OUT</button>
	</div>
<br>
	<div id="footer">
		<label>Contact us</label>
	<br>
	<a href="mailto:matuslaw.programming@gmail.com?subject=Need Help #00000" id="contact_mail">Send mail</a>
		
	</div>

<script>
var login_h="<?php echo $login ?>";
</script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="scripts/homecontroller.js"></script>

</body>
</html>
<?php
session_start();
if((isset($_SESSION['logged'])==1))
{
	header("Location: home.php");
	die();
}

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="images/signinicon.png">
	<link rel="stylesheet" type="text/css" href="styles/start_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400i&display=swap" rel="stylesheet">
	<title>Sign in</title>
</head>
<body>

<div id="tlo"></div>
	
	
<div class="holder">
<div id="holder_pom">
		<label id="welcomel"><b>WELCOME</b></label>
	<div class="trzymacz_pom">
	<input type="text" id="loginf" name="loginf" class="wejscie" spellcheck="false">
	<label for="loginf" id="loginl"><em>Enter your login...</em></label>
	</div>
	<div class="trzymacz_pom">
	<input type="password" id="passf" name="passf" class="wejscie" spellcheck="false">
	<label for="passf" id="passl"><em>Enter your password...</em></label>
	</div>
</div>
	<input type="text" id="pom_input">
	<button id="submit_btn" onclick="zmiana(); return false;">SUBMIT</button>
	<label id="errorl" style="visibility: hidden;"><em><b>Incorrect login<br> or password!</b></em></label>
	<a href="register.php">
	<div class="box">
	<span id="register_lnk"><b>REGISTER</b></span>
	</div>
	</a>
	<div id="remember_box">
			<b>REMEMBER ME</b>
	</div>
</div>

	

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="scripts/startcontroller.js"></script>

</body>
</html>
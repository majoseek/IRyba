<?php
$loginwp=trim($_POST['registered']);
$imie=trim($_POST['imie']);
$email=trim($_POST['email']);
$pass=trim($_POST['password']);
$check=$_POST['check'];
$key_pom="51231237532176352176135";
$key=md5(md5(md5(md5($key_pom))));
$salt=rand(0,9);
$salt2=rand(3,5);
if($check==2)
{
$wiadomosc='
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body style="font-family: '."Squada One".', cursive;">
<div style="font-size: 30px; border:3px solid black; border-radius:30px;">
<br>
<center>Welcome <b>'.$imie.'!</b></center> '.
'
<br>
<center>Please click the link below to complete<br>registration process</center>
<br>
<div style="background-color:black;">
<a href="iryba.pl/emailreceived.php?login='.$salt.md5(md5(md5($loginwp))).$salt2.'&key='.$key.'" style="color:white; text-decoration:none; font-size:38px;"><center><b>LINK</b></center></a>
</div>
</div>
<div style="font-size: 22px;">
<br>
<br>
<br>
<em>Thank you for joining our team!</em>
<br>
<div style="border: 3px solid black;"></div>
<br>
IRyba Support
</div>
</body>
</html>
';

$headers = "From: " . "matuslaw.mati@iryba.pl" . "\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($email, "ACCOUNT CONFIRMATION", $wiadomosc, $headers);
}
else if($check==3)
{
	$wiadomosc='
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body style="font-family: '."Squada One".', cursive;">
<div style="font-size: 30px; border:3px solid black; border-radius:30px;">
<br>
<center>Welcome <b>'.$imie.'!</b></center> '.
'
<br>
<center>Please click the link below to complete<br>password change process</center>
<br>
<div style="background-color:black;">
<a href="iryba.pl/passwordchange.php?login='.$salt.md5(md5(md5($loginwp))).$salt2.'&pass='.$pass.'&key='.$key.'
" style="color:white; text-decoration:none; font-size:38px;"><center><b>LINK</b></center></a>
</div>
</div>
<div style="font-size: 22px;">
<br>
<br>
<br>
<em>Best regards!</em>
<br>
<div style="border: 3px solid black;"></div>
<br>
IRyba Support
</div>
</body>
</html>
';

$headers = "From: " . "matuslaw.mati@iryba.pl" . "\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($email, "PASSWORD CHANGE", $wiadomosc, $headers);
}
else if($check==4)
{
	$wiadomosc='
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body style="font-family: '."Squada One".', cursive;">
<div style="font-size: 30px; border:3px solid black; border-radius:30px;">
<br>
<center>Welcome <b>'.$imie.'!</b></center> '.
'
<br>
<center>Please click the link below to complete<br>the account removal process</center>
<br>
<div style="background-color:black;">
<a href="iryba.pl/users/deleteaccount.php?login='.$salt.md5(md5(md5($loginwp))).$salt2.'&key='.$key.'
" style="color:white; text-decoration:none; font-size:38px;"><center><b>LINK</b></center></a>
</div>
</div>
<div style="font-size: 22px;">
<br>
<br>
<br>
<em>Best regards!</em>
<br>
<div style="border: 3px solid black;"></div>
<br>
IRyba Support
</div>
</body>
</html>
';

$headers = "From: " . "matuslaw.mati@iryba.pl" . "\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($email, "ACCOUNT REMOVAL", $wiadomosc, $headers);
}
?>
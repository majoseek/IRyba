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
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$imie="";
$haslo="";
$email="";
$fileext="";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login, Password, Name, Email, FileExt FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	if($row["Login"]==$login)
    	{
    		$imie=$row["Name"];
    		$haslo=$row["Password"];
    		$email=$row["Email"];
    		$fileext=$row["FileExt"];
    		break;
    	}
    	$index++;
    }
} 

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="icon" href="images/account_icon.png">
	<link rel="stylesheet" type="text/css" href="styles/home_style.css">
	<link rel="stylesheet" type="text/css" href="styles/account_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400i&display=swap" rel="stylesheet">
</head>
<body>
	<div id="tlo"></div>
	<img id="koleszka" src="images/koleszka.png">
<div id="menu">
		<button class="przycisk" onclick="home_click(); return false;">HOME</button>
		<button class="przycisk" onclick="cloud_click(); return false;">CLOUD</button>
		<button class="przycisk" onclick="account_click(); return false;" style="background-color: rgba(50, 211, 120, 0.9);">ACCOUNT</button>
		<button class="przycisk" onclick="about_click(); return false;">ABOUT</button>
		<button id="wyloguj_btn" class="przycisk" onclick="log_out();">LOG OUT</button>
	</div>
	
	<div id="main_holder">
		<div id="data_holder">
	<div id="logo_holder">
	<img src="" id="logo">
	</div>
	<div id="info_holder">
	
	<div class="trzymacz">
			<label id="imie_label" class="info_labels">Jakiesimie</label>
	</div>
	<div class="trzymacz">
		<label id="login_label" class="info_labels">Jakislogin</label>
	</div>
	<div class="trzymacz">
	<label id="email_label" class="info_labels">Jakisemail@gmail.com</label>
	</div>
	</div>

		</div>

	<div id="buttons_holder">
	<button id="passwordchange_btn" class="options_btn">CHANGE PASSWORD</button>
	<form action="logoupload.php" method="post" onsubmit="return sprawdz();" enctype="multipart/form-data">
	<div id="updatelogo_holder" class="options_btn">
	<div id="file_holder">
	<div class="file">
		<span></span>
		<input type="file" name="fileToUpload" id="fileToUpload">
	</div>
	</div>
	<input type="submit" value="UPLOAD LOGO" name="submit_btn" id="submit_btn">
	<label id="filename_label">File name</label>
	</div>
	</form>
	<button id="deleteaccount_btn" class="options_btn">DELETE ACCOUNT</button>
	
	</div>
	</div>

<br>
	<div id="footer">
		<label>Contact us</label>
	<br>
	<a href="mailto:matuslaw.programming@gmail.com?subject=Need Help #00000" id="contact_mail">Send mail</a>
		
	</div>

<script>
var imie="<?php echo $imie ?>";
var login_h="<?php echo $login ?>";
var email="<?php echo $email ?>";
var fileext="<?php echo $fileext ?>";
</script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="scripts/homecontroller.js"></script>
	<script src="scripts/account_controller.js"></script>
</body>
</html>
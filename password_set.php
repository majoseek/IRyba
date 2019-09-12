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
$email="";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login, Name, Email FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	if($row["Login"]==$login)
    	{
    		$imie=$row["Name"];
    		$email=$row["Email"];
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
	<title>Password setup</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/email_style.css">
	<link rel="stylesheet" type="text/css" href="styles/passwordset_style.css">
</head>
<body>
	<div id="holder">
		<label id="holder_label">Set up new password</label>
	<input type="text" id="pass1" class="pass_in" placeholder="Enter new password..." spellcheck="false">
	<div class="container" id="photo_ipass">
	<img src="images/info_small.png" class="photo_i" id="passp">
	<div class="tool-tip">
		<b>Must contain at least:</b>
	<ul>
		<li>6 characters</li>
		<li>One digit</li>
		<li>One special character</li>
		<li>One upper case</li>
	</ul>
	</div>
	</div>
	<input type="text" id="pass2" class="pass_in" placeholder="Repeat new password..." spellcheck="false">
	<div class="container" id="photo_ipass">
	<img src="images/info_small.png" class="photo_i" id="passp2">
	<div class="tool-tip">
		<br><br>
		<b>Must match with <br>password typed previously</b>
	</div>
	</div>
	<button id="setpass_btn">CONFIRM</button>
	</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
	var login_h="<?php echo $login ?>";
	var imie="<?php echo $imie ?>";
	var email="<?php echo $email ?>";
</script>
<script src="scripts/password_set.js"></script>
</body>
</html>
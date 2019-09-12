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
$name="";
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login, Name FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	if($row["Login"]==$login)
    	{
    		$name=$row["Name"];
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
	<link rel="icon" href="images/home_icon.png">
	<link rel="stylesheet" type="text/css" href="styles/home.css">
	<link rel="stylesheet" type="text/css" href="styles/home_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400i&display=swap" rel="stylesheet">
	<title>Home</title>
</head>
<body>
	<div id="tlo"></div>
	<img id="koleszka" src="images/koleszka.png">
<div id="menu">
		<button class="przycisk" onclick="home_click(); return false;">HOME</button>
		<button class="przycisk" onclick="cloud_click(); return false;">CLOUD</button>
		<button class="przycisk" onclick="account_click(); return false;">ACCOUNT</button>
		<button class="przycisk" onclick="about_click(); return false;">ABOUT</button>
		<button id="wyloguj_btn" class="przycisk" onclick="log_out();">LOG OUT</button>
	</div>
	
	<label class="ml3">Welcome to IRyba</label>
<br>
	<div id="footer">
		<div id="footer_holder">
		<label>Contact us</label>
	<br>
	<a href="mailto:matuslaw.programming@gmail.com?subject=Need Help #00000" id="contact_mail">Send mail</a>
		</div>
		
	</div>

<script>
var login_h="<?php echo $login ?>";
</script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	<script src="scripts/home_c.js"></script>
	<script src="scripts/homecontroller.js"></script>

</body>
</html>
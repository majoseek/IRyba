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

$direction="users/".$login."/";
$pliki=array();
$name=$direction;
	$index=0;
    $path = realpath($name);
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CATCH_GET_CHILD);
    foreach($objects as $name => $object){
            $pliki[$index]=basename($name);
            $index++;
    }

$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";

$fileext="";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login,FileExt FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	if($row["Login"]==$login)
    	{
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
	<title>Cloud</title>
	<link rel="icon" href="images/cloud.png">
	<link rel="stylesheet" type="text/css" href="styles/home_style.css">
	<link rel="stylesheet" type="text/css" href="styles/cloud_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">

	
	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
	<div id="tlo"></div>
<img id="koleszka" src="images/koleszka.png">
<div id="menu">
		<button class="przycisk" onclick="home_click(); return false;">HOME</button>
		<button class="przycisk" onclick="cloud_click(); return false;" style="background-color: rgba(50, 211, 120, 0.9);">CLOUD</button>
		<button class="przycisk" onclick="account_click(); return false;">ACCOUNT</button>
		<button class="przycisk" onclick="about_click(); return false;">ABOUT</button>
		<button id="wyloguj_btn" class="przycisk" onclick="log_out();">LOG OUT</button>
	</div>

<div id="phpmanager_holder">
	<div class="ui-widget">
  <input type="text" id="tags" placeholder="Enter file name to find..." spellcheck="false">
</div>
	
<div id="buttons">
<!--BUTTONY-->
</div>
</div>



<div id="managerholder">
<form action="fileupload.php" method="post" enctype="multipart/form-data">

	<div id="updatelogo_holder">
	<div id="fileholder">
	<div class="file">
		<span></span>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<label id="filename_label">No file choosen</label>
	</div>
	</div>
	<input type="submit" value="UPLOAD FILE" name="submit_btn" id="submit_btn">
	</div>
</form>
</div>


<br>
<div id="footer">
	<label>Contact us</label>
	<br>
	<a href="mailto:matuslaw.programming@gmail.com?subject=Need Help #00000" id="contact_mail">Send mail</a>
</div>
<script>
var login_h="<?php echo $login ?>";
		<?php
		$js_array = json_encode($pliki);
		echo "var pliczki = ". $js_array . ";\n";
?>
</script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script src="scripts/homecontroller.js"></script>
	<script src="scripts/cloudcontroller.js"></script>

</body>
</html>
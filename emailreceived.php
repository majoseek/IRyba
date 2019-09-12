<?php
$key=$_GET['key'];
if($key!=md5(md5(md5(md5("51231237532176352176135")))))
{
header('Location: index.php');
exit;
}
else
{
$loging=$_GET['login'];
$login=substr($loging, 1, (strlen($loging)-2));
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$loginy=array();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	$loginy[$index]=$row["Login"];
    	$index++;
    }
} 


for($i=0;$i<count($loginy);$i++)
{
	if(md5(md5(md5($loginy[$i])))==$login)
	{
		$logintoactive=$loginy[$i];//UPDATE `tabelkatest` SET Active= 1 WHERE Login="yuioppo";
		break;
	}
}
$sqlup='UPDATE `tabelkatest` SET Active= 1 WHERE Login="'.$logintoactive.'";';
$conn->query($sqlup);
$conn->close();
$path="users/".$logintoactive;
$path_logo="users/".$logintoactive."/logo";
if (!file_exists($path)) {
    mkdir($path, 0700);
    mkdir($path_logo, 0700);
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Confirmation</title>
	<link rel="stylesheet" type="text/css" href="styles/email_style.css">
</head>
<body>
	<div id="tlo"></div>
	<h1>YOUR ACCOUNT HAS BEEN CONFIRMED</h1>
</body>
</html>
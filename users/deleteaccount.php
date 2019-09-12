<?php
$key=$_GET['key'];
if($key!=md5(md5(md5(md5("51231237532176352176135")))))
{
header('Location: index.php');
exit;
}
session_start();
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$loging=$_GET['login'];
$login = substr($loging, 1, (strlen($loging)-2));
$logintoremove="";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//DELETE FROM `tabelkatest` WHERE Login="Testooo"
$sql = "SELECT Login, Password, Name, Email, FileExt FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	if(md5(md5(md5($row["Login"])))==$login)
    	{
    		$logintoremove=$row["Login"];
    		break;
    	}
    	$index++;
    }
} 
$sqld = 'DELETE FROM `tabelkatest` WHERE Login="'.$logintoremove.'"';
$conn->query($sqld);

 function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }
rrmdir($logintoremove);
$conn->close();
session_unset();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/email_style.css">
    <title>DELETE ACCOUNT</title>
</head>
<body>
  <div id="tlo"></div>
    <h1>YOUR ACCOUNT HAS BEEN SUCCESSFULLY REMOVED</h1>
</body>
</html>
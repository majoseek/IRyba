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
if($_GET['key']!=md5(md5(md5(md5("51231237532176352176135")))))
{
    header("Location: index.php");
    die();
}
$login=$_SESSION['login'];
 $data=$_GET['file'];  
        $dir = "users/".$login;   
        $dirHandle = opendir($dir);    
        while ($file = readdir($dirHandle)) {    
            if($file==$data) {
                unlink($dir."/".$file);
            }
        }    
        closedir($dirHandle);

        echo "<script>window.close();</script>";
        exit;
?>
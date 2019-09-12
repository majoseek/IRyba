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
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = 'users/'.$login.'/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
    }else{
        echo 'The file does not exist.';
    }
	}
echo "<script>window.close();</script>";
exit;
?>
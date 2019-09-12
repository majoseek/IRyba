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
$koncowka_tab=array("bmp","jpg","jpeg","jpe","jfif","gif","png");
function char_at($str, $pos)
{
  return $str{$pos};
}
function koncowka($nazwa){
$i=0;
$wyraz="";
while(char_at($nazwa,$i)!='.')
{
$i++;
}
$i++;
for($j=$i;$j<strlen($nazwa);$j++)
{
  $wyraz.=char_at($nazwa,$j);
}


return $wyraz;
}

$target_dir = "users/".$login."/logo"."/";
$files = glob($target_dir."*"); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
//SQL

$koncowa=koncowka(basename($_FILES["fileToUpload"]["name"]));
$koncowka_dobra=false;
$rozmiar_dobry=false;
if(in_array(koncowka(basename($_FILES["fileToUpload"]["name"])), $koncowka_tab))
{
  $koncowka_dobra=true;
}
if($_FILES["fileToUpload"]["size"]<3000000)
{
  $rozmiar_dobry=true;
}
if($rozmiar_dobry==false)
{
  $koncowa="duzy";
}
if($koncowka_dobra==false)
{
  $koncowa="zla";
}
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//UPDATE `tabelkatest` SET FileExt='.jpg' WHERE Login="Matimati"
$sql = 'UPDATE `tabelkatest` SET FileExt=".'.$koncowa.'" WHERE Login="'.$login.'"';
$result = $conn->query($sql);
$conn->close();
//
if($koncowka_dobra==false)
{
  //header("Refresh:0; url=account.php");
  echo "<script>alert('Wrong logo image format!'); window.location='account.php';</script>";
  exit();
}
if($rozmiar_dobry==false)
{
  echo "<script>alert('Logo image size must be less than 3MB!'); window.location='account.php';</script>";
  exit();
}


$target_file = $target_dir ."logo.".koncowka(basename($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;



$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
   //     echo "File is not an image.";
        $uploadOk = 0;
    }
            }
// Check if file already exists
if (file_exists($target_file)) {
  //  echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 || $koncowka_dobra==false) {
   // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      //  echo "Sorry, there was an error uploading your file.";
    }
}
header("Refresh:0; url=account.php");
exit();

?>
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
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login, Password, Name, Email FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
      if($row["Login"]==$login)
      {
        $imie=$row["Name"];
        $haslo=$row["Password"];
        $email=$row["Email"];
        break;
      }
      $index++;
    }
} 

$conn->close();
////
$target_dir = "users/".$login."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
if ($uploadOk == 0) {
   // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      //  echo "Sorry, there was an error uploading your file.";
    }
}
header("Refresh:0; url=user_cloud.php");

exit();
?>
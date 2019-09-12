<?php
session_start();
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$loginy=array();
$hasla=array();
$aktywne=array();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Login, Password, Active FROM tabelkatest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc()) {
    	$loginy[$index]=$row["Login"];
    	$hasla[$index]=$row["Password"];
    	$aktywne[$index]=$row["Active"];
    	$index++;
    }
} 


$conn->close();


 $correct="niewprowadzono";
  $index=-1;


$login_wprowadzony=trim($_POST['login']);
$haslo_wprowadzone=trim($_POST["haslo"]);
$curractive=0;
$corr=false;
for($i=0;$i<count($loginy);$i++)
{
	if($loginy[$i]==$login_wprowadzony && $hasla[$i]==$haslo_wprowadzone)
	{
		$corr=true;
		$curractive=$aktywne[$i];
		break;
	}
}

if($corr==true && $curractive==1)
{
	$correct="poprawne";
	$_SESSION['logged']=1;
	$_SESSION['login']=$login_wprowadzony;
}
else
{
	if($corr==false)
	{
		$correct="niepoprawne";
	}
	else{
		$correct="nieaktywne";
	}
	session_unset();
}

echo $correct;

?>
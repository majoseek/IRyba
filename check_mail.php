<?php
if(!isset($_POST['email']) || empty($_POST['email']))
{
   echo '0'; exit();
}
else
{
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$emailwp=trim($_POST['email']);
$emaile=array();
$istnieje=0;
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqls = "SELECT Email FROM tabelkatest";
$result = $conn->query($sqls);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc())
    {
    	$emaile[$index]=$row["Email"];
    	$index++;
    }
} 

for($i=0;$i<count($emaile);$i++)
{
	if($emaile[$i]==$emailwp)
	{
		$istnieje=1;
		break;
	}
}


$conn->close();
if($istnieje==1)
{
	echo '1';
exit();
}
else{
echo '0';
exit();
}
}

?>
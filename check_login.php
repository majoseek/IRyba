<?php
if(!isset($_POST['user']) || empty($_POST['user']))
{
   echo '0'; exit();
}
else
{
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$loginwp=trim($_POST['user']);
$loginy=array();
$istnieje=0;
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqls = "SELECT Login FROM tabelkatest";
$result = $conn->query($sqls);

if ($result->num_rows > 0) {
    $index=0;
    while($row = $result->fetch_assoc())
    {
    	$loginy[$index]=$row["Login"];
    	$index++;
    }
} 

for($i=0;$i<count($loginy);$i++)
{
	if($loginy[$i]==$loginwp)
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
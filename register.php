<?php
$servername = "localhost";
$username = "29647948_mat";
$password = "DBMAT_19692000";
$dbname = "29647948_mat";
$loginwp=trim($_GET['login']);
$passwordwp=trim($_GET['haslo']);
$namewp=trim($_GET['imie']);
$emailwp=trim($_GET['email']);
$kliknieto=$_GET['kliknal'];
$loginy=array();
$istnieje=0;
$conn = new mysqli($servername, $username, $password, $dbname);
if($kliknieto==1)
{

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


if($istnieje==0)
{
$sql = 'INSERT INTO `tabelkatest`(`Login`, `Password`, `Name`, `Email`, `Active`) VALUES ("'.$loginwp.'", "'.$passwordwp.'", "'.$namewp.'", "'.$emailwp.'", 0);';
$conn->query($sql);
header("Location: index.php");
}
$conn->close();
}	
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIGN UP</title>
	<link rel="icon" type="image/png" href="images/register_icon.png">
	<link rel="stylesheet" type="text/css" href="styles/register_style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400i&display=swap" rel="stylesheet">
	<title>Sign up</title>
</head>
<body>
	
<div class="holderr">
<label id="registerl" style="visibility: hidden;"><b>PLEASE FILL IN THIS FORM</b></label>
	<div class="trzymacz">
	<input type="text" id="namer" name="namer" class="wejscier" spellcheck="false">
	<label for="namer" id="namelr" class="labelr"><em>Name</em></label>
	<div class="container" id="photo_iname">
	<img src="images/info_small.png" class="photo_i" id="namep">
	<div class="tool-tip"><br><br><b>Must start with <br>upper character</b></div>
	
	</div>
	</div>

	<div class="trzymacz">
	<input type="text" id="emailr" name="emailr" class="wejscier" spellcheck="false">
	<label for="emailr" id="emaillr" class="labelr"><em>E-mail</em></label>
	<div class="container" id="photo_iemail">
	<img src="images/info_small.png" class="photo_i" id="emailp">
	<div class="tool-tip" id="email_div"><br><br><b>We will send confirmation<br> mail to this adress</b></div>
	</div>
	</div>

	<div class="trzymacz">
	<input type="text" id="loginr" name="loginr" class="wejscier" spellcheck="false">
	<label for="loginr" id="loginlr" class="labelr"><em>Login</em></label>
	<div class="container" id="photo_ilogin">
	<img src="images/info_small.png" class="photo_i" id="loginp">
	<div class="tool-tip" id="login_div"><br><b>Must have at <br>least 6 characters</b></div>
	</div>
	</div>

	<div class="trzymacz">
	<input type="password" id="passr" name="passr" class="wejscier" spellcheck="false">
	<label for="passr" id="passlr" class="labelr"><em>Password</em></label>
	<div class="container" id="photo_ipass">
	<img src="images/info_small.png" class="photo_i" id="passp">
	<div class="tool-tip">
		<b>Must contain at least:</b>
	<ul>
		<li>6 characters</li>
		<li>One digit</li>
		<li>One special character</li>
		<li>One upper case</li>
	</ul>
	</div>
	</div>
	</div>
	
	
	


	<input type="text" id="pom_input">

	<button id="submit_btn" onclick="zmiana_r(); return false;">REGISTER</button>
	<a href="index.php">
	<div class="box">
	<span id="login_lnk"><b>LOGIN</b></span>
	</div>
	</a>
	<button id="clear_btn">CLEAR</button>
</div>






<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>var added="<?php echo $wstawiono?>";
</script>
<script src="scripts/registercontroller.js"></script>

</body>
</html>
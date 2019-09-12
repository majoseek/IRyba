<?php
session_start();
if(!(isset($_SESSION['logged'])==1))
{
	header("Location: index.php");
	die();
}
$nazwa=$_GET['img'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Show image</title>

	<link rel="icon" href="images/picture.png">
	<link rel="stylesheet" type="text/css" href="styles/media.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
	<div id="tlo"></div>
	<div id="image_holder" class="mediathings">
		<img src="images/camera.png" id="show_img">
	</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
	$(document).ready(function() {
	var nazwa="<?php echo $nazwa ?>";
	console.log(nazwa);
	$("#show_img").attr('src', nazwa);
});
</script>
</body>
</html>
<?php
session_start();
if(!(isset($_SESSION['logged'])==1))
{
	header("Location: index.php");
	die();
}
$nazwa=$_GET['video'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Show video</title>

	<link rel="icon" href="images/video-player.png">
	<link rel="stylesheet" type="text/css" href="styles/media.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
	<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
	<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
</head>
<body>
	<div id="tlo"></div>
	<div id="video_holder" class="mediathings">
<video id='my-video' class='video-js vjs-big-play-centered' controls preload='auto' width='100%' height='100%'
  poster='images/black_b.jpg' data-setup='{"fluid": true}'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
    </p>
  </video>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
	$(document).ready(function() {
		
	var nazwa="<?php echo $nazwa ?>";
	 videojs('my-video').ready(function () {
                var myPlayer = this;   
                myPlayer.src({src: nazwa});
            });
	 	});
</script>
</body>
</html>
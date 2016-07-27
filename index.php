<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Bài học CSS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="wrapper">
	<div id="header" >
		<img src="images/banner.png"/>
	</div>
	<div id="menu"><center> Menu</center></div>
	<div id="left"><center>Left</center></div>

	<div id="content">
		<?php
			echo "<center><h1> Hello World!</h1></center>";
		?>
		<a href="login.php"> Đăng Nhập </br>
		<a href="register.php">Đăng Ký </br>
	</div>


	<div id="right"><center>Right</center></div>
	<div id="footer"><center>Footer</center></div>
</div>
</body>
</html>
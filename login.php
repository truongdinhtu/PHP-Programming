<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Trang Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>TRANG ĐĂNG NHẬP</h2>
	<a href="index.php">Click vào đây để quay lại Trang chủ</a><br/>
	<form action="checklogin.php" method="POST">
		Enter Username: <input type="text" name="username" required="required"><br/>
		Enter Password: <input type="password" name="password" required="required"><br/>
		<input type="submit" value="Đăng nhập">
	</form>
</body>
</html>
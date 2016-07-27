<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Trang đăng ký users</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>TRANG ĐĂNG KÝ THÀNH VIÊN</h2>
	<a href="index.php">Click vào đây để quay lại Trang chủ <br/></a>
	<form action="register.php" method="POST">
		Enter Username: <input type="text" name="username" required="required"/><br/>
		Enter Password: <input type="password" name="password" required="required"/><br/>
		<input type="submit" value="Đăng ký"/>
	</form>
</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		echo "Username is: " .$username ."</br>";
		echo "Password is: " .$password ."</br>";

		$notfound = true;
		// Connect to Server
		mysql_connect("localhost","root","") or die(mysql_error());

		//Connect to database
		mysql_select_db("mydb") or die("Khong the ket noi duoc database");

		// Truy van lay du lieu
		$query = mysql_query("Select * from users");
		// Lặp từng dòng để kiểm tra user tồn tại chưa
		while ($row = mysql_fetch_array($query)) // Hiển thị tất cả các dòng từ truy vấn
		{
			if($username==$row['username']) // Kiểm tra có tồn tại username trong database không?
			{
				$notfound = false;
				print('<script>alert("Username da ton tai");</script>'); // Nhac nho nguoi dung
				print('<script>window.location.assign("register.php");</script>'); // Redirect to register.php
			}
		}

		// Neu khong tim thay user nao da ton tai, thi them vao DB
		if($notfound)
		{
			mysql_query("INSERT INTO users(username,password) VALUES('$username','$password')");
			print('<script>alert("INSERT Thanh cong");</script>'); // Nhac nho nguoi dung
			print('<script>window.location.assign("register.php");</script>'); // Redirect to register.php
		}
	}
?>
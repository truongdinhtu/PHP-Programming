<?php
	session_start();
	// Lấy username và password từ form nhập để check
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

	//Kết nối Server và DB
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("mydb") or die("Khong ket noi thanh cong");
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$exist = mysql_num_rows($query);

	// Nếu tồn tại username, nghĩa là số dòng >0
	if($exist > 0)
	{
		while ($row = mysql_fetch_assoc($query)) // Lấy từng dòng trong query
		{
			if (($row['username']==$username) && ($row['password']==$password))
			{
				$_SESSION['user'] = $username;
				header("location: home.php"); // Redirect user to authenticated home page
			}
			else // Chi co the la sai passsword
			{
				print '<script>alert("Invalid password!");</script>';
				print '<script>window.location.assign("login.php"); </script>';
			}
		}
	}
	else // Nghia la User nhap khong dung
	{
				print '<script>alert("Invalid Username!");</script>';
				print '<script>window.location.assign("login.php"); </script>';
	}

?>
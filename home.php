<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>TRANG CHỦ</title>
</head>
<body>
	<h2>CHÀO MỪNG BẠN ĐẾN VỚI TRANG CHỦ CỦA CHÚNG TÔI</h2>
	<?php
		session_start();
		// Kiem tra co ton tai phien user khong?
		if($_SESSION['user'])
		{
			$user = $_SESSION['user'];
		}
		else
		{
			header("location: login.php");
		}
	?>

	<p>Hello <?php print "$user"?>! </p>
	<a href="logout.php">Click here to Logout</a><br/><br/>

	<!-- Tạo form để add dữ liệu vào database-->
	<form action="add.php" method="POST">
		Thêm vào danh sách: <input type="text" name="details"/><br/>
		public post? <input type="checkbox" name="public[]" value="yes"/><br/>
		<input type="submit" value="Add to list"/>
	</form>

	<h2 align="center">My list</h2>
		<table border="1px" width="100%">
			<!-- Dòng tiêu đề-->
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Public Post</th>
			</tr>

			<!-- Kết nối db để lấy dữ liệu ra-->
			<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysql_select_db("mydb") or die("Cannot connect to database"); //connect to database
				$query = mysql_query("Select * from list"); // SQL Query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>"; // In từng dòng table row
						Print '<td align="center">'. $row['id'] . "</td>"; // In table data
						Print '<td align="center">'. $row['details'] . "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
						Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
						Print '<td align="center">'. $row['public']. "</td>";
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?id=" + id);
			  }
			}
		</script>

</body>
</html>
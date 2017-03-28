<!DOCTYPE html>
<head>
	<title>Administration</title>
</head>

<body>
	<table cellpadding="5" border="1">
		<?php
			require ("AdminFunctions.php");
			require ("DBManipFunctions.php");
			
			if (isset($_GET["msg"])) {
				$message = $_GET["msg"];
				DisplayErrors ($message);
			}
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "HR";
			
			$conn = our_sql_connect($servername, $username, $password,$db);
			
			if ($conn->connect_error) {
				die ("Connection Failed: " . $conn->connect_error);
			}
			
			echo "<br /> connection established - ready for SQL Commands <br/>";
			
			$sSQL = "SELECT id, username, password, gender FROM users";
			
			echo "<br/> $sSQL <br/>" ;
			
			// execute command	
			$resultSet = mysqli_query($conn, $sSQL);
			
			print ("<tr><td colspan = '4' align='right'> <a href='Insert_users.php'>Insert User</a><td></tr>");
			
			while ($row = mysqli_fetch_array($resultSet)) {
				print ("<tr>"); 
				print ("<td> {$row['username']} </td>");
				print ("<td> {$row['password']} </td>");
				print ("<td> {$row['gender']} </td>");
				print ("<td><a href='Edit_Users.php?p={$row['id']}'>Edit</a>   |   ");
				print ("<td><a href='Delete_Users.php?p={$row['id']}'>Delete</a>   |   ");
				print("</tr>");
				
			}
		?>
		
	</table>
</body>

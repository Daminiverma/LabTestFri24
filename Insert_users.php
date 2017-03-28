<!DOCTYPE  html>
<head>
	<title> Insert Users</title>
</head>
<body>
	<?php
		require_once("AdminFunctions.php");
		require_once("DBManipFunctions.php");
		
		if (!isset($_POST['submit'])) {
			
			// create the form to be edited
			print ("<form action='Insert_users.php' method='post'>");
			
	 		print ("Username: <br/>
			         <input name='username'><br/>
			Password: <br/>
			         <input type='password' name='password'><br/>
			Gender: <br/>
			         <input type='text' name='gender'><br/>
			<input type='submit' name='submit' value='Insert'>
			</form>");        
		} else {
			// connect to database
			$conn = our_sql_connect_no_parameters();
			
			$uname = $_POST["username"];
			$pass = $_POST["password"];
			$gen = $_POST["gender"];
			
			$sSQL = "INSERT INTO users (username, password, gender) VALUES('$uname','$pass','$gen')";
			
			$isInserted = mysqli_query ($conn, $sSQL);
			
			if (isInserted) {
				header("location: UserAdminHome.php?msg=InsertSuccess");
			} else {
				header("location: UserAdminHome.php?msg=InsertSuccess");
			}
		}
		
	?>
</body>
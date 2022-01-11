<<<<<<< HEAD
<<<<<<< HEAD
<?php
#clear Error 
$error='';
#Include import php files
include("./Api/sql_log.php");
session_start();
#Check is file called on post, if yes then go for user check
if($_SERVER["REQUEST_METHOD"] == "POST") {
	# username and password sent from form 
	#connection error detection
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	#Run real escape string to username and password
	$User=mysqli_real_escape_string($con, $_POST['User']);
	$Pass=mysqli_real_escape_string($con, $_POST['Pass']); 
	#Make query sql database 
	$query = "SELECT pass FROM Account WHERE name='$User'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	#Make "pass" variable hash
	$hash = $fetch["pass"];

	//$hash=mysql_result($result, 0);
	#check username and password against database data, if valid, login, else error
	if (password_verify($Pass, $hash)) {
		//session_register("User");
		$_SESSION['login_user'] = $User;
		#Update unixtime to database
		$session=strtotime("now");
		#Make the update query to database
		$query = "update Account SET session=$session WHERE name='$User'";
		$result=$con->query($query);
		#Move user to Welcome page
		header("location: welcome.php");
		}
	else {
		#Show error on textbox below login
		$error = "Your Login Name or Password is invalid";
		}
	}
?>


<!-- Main Page of Login interface -->
<html>
	
	<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	
	<body bgcolor = "#FFFFFF">
	
	<div align = "center">
		<div style = "width:300px; border: solid 1px #333333; " align = "left">
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
			<div style = "margin:30px">
			
			<form action = "" method = "post">
				<label>UserName  :</label><input type = "text" name = "User" class = "box"/><br /><br />
				<label>Password  :</label><input type = "password" name = "Pass" class = "box" /><br/><br />
				<input type = "submit" value = " Submit "/><br />
			</form>
			<div style = "font-size:11px; color:#cc00cc; margin-top:10px">DEMO test1:test1</div>			
			<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
			</div>
				
		</div>
			
	</div>

	</body>
</html>
=======
=======
>>>>>>> 20a6d7934d583cab22eb69a38878c7021576e9f6
<?php
#clear Error 
$error='';
#Include import php files
include("./Api/sql_log.php");
session_start();
#Check is file called on post, if yes then go for user check
if($_SERVER["REQUEST_METHOD"] == "POST") {
	# username and password sent from form 
	#connection error detection
	if (mysqli_connect_errno())  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	#Run real escape string to username and password
	$User=mysqli_real_escape_string($con, $_POST['User']);
	$Pass=mysqli_real_escape_string($con, $_POST['Pass']); 
	#Make query sql database 
	$query = "SELECT pass FROM Account WHERE name='$User'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	#Make "pass" variable hash
	$hash = $fetch["pass"];

	//$hash=mysql_result($result, 0);
	#check username and password against database data, if valid, login, else error
	if (password_verify($Pass, $hash)) {
		//session_register("User");
		$_SESSION['login_user'] = $User;
		#Update unixtime to database
		$session=strtotime("now");
		#Make the update query to database
		$query = "update Account SET session=$session WHERE name='$User'";
		$result=$con->query($query);
		#Move user to Welcome page
		header("location: welcome.php");
		}
	else {
		#Show error on textbox below login
		$error = "Your Login Name or Password is invalid";
		}
	}
?>


<!-- Main Page of Login interface -->
<html>
	
	<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	
	<body bgcolor = "#FFFFFF">
	
	<div align = "center">
		<div style = "width:300px; border: solid 1px #333333; " align = "left">
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
			<div style = "margin:30px">
			
			<form action = "" method = "post">
				<label>UserName  :</label><input type = "text" name = "User" class = "box"/><br /><br />
				<label>Password  :</label><input type = "password" name = "Pass" class = "box" /><br/><br />
				<input type = "submit" value = " Submit "/><br />
			</form>
			<div style = "font-size:11px; color:#cc00cc; margin-top:10px">DEMO test1:test1</div>			
			<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
			</div>
				
		</div>
			
	</div>

	</body>
</html>
>>>>>>> 20a6d7934d583cab22eb69a38878c7021576e9f6

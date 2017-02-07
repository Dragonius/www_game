<?php
$error='';
	include("sql_log.php");
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 
	

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$User = mysqli_real_escape_string($con,$_POST['User']);
	$Pass = mysqli_real_escape_string($con,$_POST['Pass']); 

$query = "SELECT pass FROM Account WHERE name='$User'";
$result=$con->query($query);
$fetch = mysqli_fetch_assoc($result);
$hash = $fetch["pass"];

//$hash=mysql_result($result, 0);
if (password_verify($Pass, $hash)) {
		//session_register("User");
		$_SESSION['login_user'] = $User;
		//päivitä unixtimea tietokantaan
		$session=strtotime("now");
		$query = "update Account SET session=$session WHERE name='$User'";
		$result=$con->query($query);
		header("location: welcome.php");
	}else {
		$error = "Your Login Name or Password is invalid";
	}
	}
?>



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

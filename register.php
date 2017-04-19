<?php echo "<a href='index.html'>Back</a><br>"; ?>

<?php
include('session.php');
include('sql_log.php');

	if($_SERVER["REQUEST_METHOD"] == "POST") {

$User=$_POST['User'];
//$Pass=$_POST['Pass'];
$Base=$_POST['Base'];
$options = [
    'cost' => 14,
];
// Get the password from post
$Pass = $_POST['Pass'];
//Make password hash and salt it
$hash = password_hash($Pass, PASSWORD_BCRYPT, $options);


//mysql_connect($servername,$username,$password);
//@mysql_select_db($dbname) or die( "Unable to select database");
//$con = mysqli_connect($servername,$username,$password,$dbname );
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
#randomize location
$dice=mt_rand(1, 4);
if ($dice == '1') {
$region='north_east'; }
if ($dice == '2') {
$region='north_west'; }
if ($dice == '3') {
$region='south_east'; }
if ($dice == '4') {
$region='south_west'; }

//check unique username
$sql = "SELECT name FROM tzcrew.Account where name='$User'";
$result = $con->query($sql);
//check username count
if ($result->num_rows < 1) {
	//check if not username is blank
	if (!$User == '') {
		//check if notpassword is blank
		if (!$Pass == '') {
			//check if not Base is blank
			if (!$Base == '') {
				$query = "INSERT INTO Account VALUES ('','$User','$hash','$Base','0')";
				$query2 = "INSERT INTO Base VALUES ('','$Base','','500','500','500','500','$region','Sol')";
				$con->query($query);
				$con->query($query2);
				mysqli_close($con);
			}
			else {	echo "Sorry! Blank Base";	mysqli_close($con);	}
		}
		else {	echo "Sorry! Blank Password";	mysqli_close($con);	}
	}
	else {	echo "Sorry! Blank Username";	mysqli_close($con);	}
}
else {	echo "Sorry! This Username already exists";	mysqli_close($con);	}
}
else {	mysqli_close($con);	header("location:tiedon_lisaaminen.html");   }
?>


<html>
<head>
<title>Register</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" >
</head>
<body>
<form name="pointform" action="register.php" method="post">
<table border="1">
<tr BGCOLOR="#C0DCC0">
<td>Username: <input type="text" name="User">&nbsp;</td>
<td>Password: <input type="password" name="Pass">&nbsp;</td>
<td>Base name: <input type="text" name="Base">&nbsp;</td>
<td><input type="Submit" VALUE="Tallenna"></td>
</tr>
</table>
</form>
<hr>

</body>
</html>


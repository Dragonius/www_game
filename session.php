<?php
	include('./Api/sql_log.php');
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	session_start();
	
	$user_check = $_SESSION['login_user'];
	$query = "SELECT name FROM Account WHERE name='$user_check'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	$login_session = $fetch["name"];
	

	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}

	#käytetään mallina
	#$endtime = strtotime( $timeoflastlogin ) + 600;
  	$session2=strtotime("now") - 300;
	$session3=strtotime("now");
	$query2 = "SELECT session from Account WHERE name='$user_check'";
	$result2=$con->query($query2);
	$fetch2 = mysqli_fetch_assoc($result2);
	#vertaa onko mysql session isompi kuin php unixtime
	 if ( $fetch2['session'] >= $session2 ) {
		mysqli_query($con, "update Account SET session=$session3 WHERE name='$user_check'");
	}
	if ( $fetch2['session'] < $session2 ) {
		session_destroy();
		header("location:login.php");
	mysqli_close($result);
	}
	
#	else {
#		session_destroy();
#		header("location:login.php");
#	}
?>

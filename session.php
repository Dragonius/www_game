<?php
   include('sql_log.php');
   session_start();
   
	$user_check = $_SESSION['login_user'];
	$query = "SELECT name FROM Account WHERE name='$user_check'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	$login_session = $fetch["name"];
	

	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}

	#kätytetään mallina
	#$endtime = strtotime( $timeoflastlogin ) + 600;
  	$session2=strtotime("now") - 300;
	$session3=strtotime("now");
	$query2 = "SELECT session from Account WHERE name='$user_check'";
	$result2=$con->query($query2);
	$fetch2 = mysqli_fetch_assoc($result2);
	#vertaa onko mysql session isompi kuin php unixtime
    if( $fetch2['session'] >= $session2 ) {
		mysqli_query($con, "update Account SET session=$session2 WHERE name='$user_check'");
	}
#Debug
#	echo "fetch2 " .	$fetch2['session'] . "<br>";
#	echo "session2 " . $session2 . "<br>" ;
#	echo "session3 " . $session3 . "<br>" ;
#	echo "query2 " . $query2  . "<br>";

#	else {
#		session_destroy();
#		header("location:login.php");
#	}
?>
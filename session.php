<<<<<<< HEAD
<?php
	#include import php files.
	include('./Api/sql_log.php');
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	session_start();
	
	#Run check agains user vs current session
	$user_check = $_SESSION['login_user'];
	$query = "SELECT name FROM Account WHERE name='$user_check'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	$login_session = $fetch["name"];
	
	#if no current session, redirect user to login page
	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}

	#Fetch Base
	$user_check = $_SESSION['login_user'];
        $query = "SELECT Base.base FROM Account,Base WHERE name='$user_check' && Account.base=Base.base LIMIT 1";
        $result=$con->query($query);
        $fetch = mysqli_fetch_assoc($result);
        $Base_data = $fetch["base"];

	#Fetch Fleet
	$user_check = $_SESSION['login_user'];
        $query = "SELECT Fleet.fleet FROM Account,Base,Fleet WHERE name='$user_check' && Account.base=Base.base && Base.fleet=Fleet.fleet LIMIT 1";
        $result=$con->query($query);
        $fetch = mysqli_fetch_assoc($result);
        $Fleet_data = $fetch["fleet"];

	#käytetään mallina
	#$endtime = strtotime( $timeoflastlogin ) + 600;
  	$session2=strtotime("now") - 300;
	$session3=strtotime("now");
	#Hae tietokannasta session numero
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
?>
=======
﻿<?php
	#include import php files.
	include('./Api/sql_log.php');
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	session_start();
	
	#Run check agains user vs current session
	$user_check = $_SESSION['login_user'];
	$query = "SELECT name FROM Account WHERE name='$user_check'";
	$result=$con->query($query);
	$fetch = mysqli_fetch_assoc($result);
	$login_session = $fetch["name"];
	
	#if no current session, redirect user to login page
	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}

	#Fetch Base
	$user_check = $_SESSION['login_user'];
        $query = "SELECT Base.base FROM Account,Base WHERE name='$user_check' && Account.base=Base.base LIMIT 1";
        $result=$con->query($query);
        $fetch = mysqli_fetch_assoc($result);
        $Base_data = $fetch["base"];

	#Fetch Fleet
	$user_check = $_SESSION['login_user'];
        $query = "SELECT Fleet.fleet FROM Account,Base,Fleet WHERE name='$user_check' && Account.base=Base.base && Base.fleet=Fleet.fleet LIMIT 1";
        $result=$con->query($query);
        $fetch = mysqli_fetch_assoc($result);
        $Fleet_data = $fetch["fleet"];

	#käytetään mallina
	#$endtime = strtotime( $timeoflastlogin ) + 600;
  	$session2=strtotime("now") - 300;
	$session3=strtotime("now");
	#Hae tietokannasta session numero
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
?>
>>>>>>> caa89ea481ed0e7c89b97368d8e1b0a9d6aeb630

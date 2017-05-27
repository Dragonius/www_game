<?php
//import php files
	include('session.php');
	include('./Api/sql_log.php');
	include('./Api/fleet_ships.php');
	
//	Ships_in_fleet(), Current still testing phase, use Api/fleet_ships.php
$ships = new fleet_ships("ships");
$ships->Ships_in_fleet();
?>
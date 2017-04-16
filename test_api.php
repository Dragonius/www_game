<?php

	include('./Api/fleet_ships.php');
	
//	Ships_in_fleet()
$ships = new fleet_ships("ships");
$ships->Ships_in_fleet();
?>
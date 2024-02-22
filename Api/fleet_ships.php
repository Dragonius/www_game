<?php

class FleetShips {
	private $fleetShips;

	public function __construct($fleetShips) {
		$this->fleetShips = $fleetShips;
	}

	public function Shipsinfleet() {
		include("./Api/sql_log.php");
		$user_check = $_SESSION['login_user'];
	#Select all fleet ships 
		$fleetShips = "SELECT Fleet.fleet, Fleet.ship 
		FROM Account, Fleet, Base, Ship 
		WHERE Base.fleet=Fleet.fleet 
		AND	Fleet.ship=Ship.name_id 
		AND Account.base=Base.base 
		AND Account.name='$user_check'";
	#make query
		$fleetShips2=$con->query($fleetShips);
	#a lonk there are data -> display it on website
		$fleetfleet = mysqli_fetch_assoc($fleetShips2);
		echo "Your Current fleet: <B>" . $fleetfleet ["fleet"] .
		"</B><br> ships: <B>" . $fleetfleet["ship"] . "</B>";
		while($fleetShips3 = $fleetShips2->fetch_assoc()) {
			echo " <B> " . $fleetShips3["ship"] . " </B> " ;
	}
    #close current connection
	$fleetShips2->close();    
    }	
}
?>
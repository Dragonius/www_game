<?php

class FleetShips {
	private $fleetShips;

	public function __construct($fleetShips) {
		$this->fleetships = $fleetShips;
	}

	public function Shipsinfleet() {
		include("./Api/sql_log.php");
		$user_check = $_SESSION['login_user'];
	
		$fleetShips = "select Fleet.fleet, Fleet.ship from Account, Fleet, Base, Ship where Base.fleet=Fleet.fleet and
		Fleet.ship=Ship.name_id and Account.base=Base.base and Account.name='$user_check'";
		$fleetShips2=$con->query($fleetShips);
		$fleetfleet = mysqli_fetch_assoc($fleetShips2);
		echo "Your Current fleet: <B>" . $fleetfleet ["fleet"] .
		"</B><br> ships: <B>" . $fleetfleet["ship"] . "</B>";
		while($fleetShips3 = $fleetShips2->fetch_assoc()) {
			echo " <B> " . $fleetShips3["ship"] . " </B> " ;
	}
        
    }	
}
?>
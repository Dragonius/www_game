<?php

class Fleet_ships {
	private $fleet_ships;

	public function __construct($fleet_ships) {
		$this->fleet_ships = $fleet_ships;
	}

 	public function Ships_in_fleet() {
		include("./Api/sql_log.php");
		$user_check = $_SESSION['login_user'];
	
		$fleet_ships = "select Fleet.fleet, Fleet.ship from Account, Fleet, Base, Ship where Base.fleet=Fleet.fleet and
		Fleet.ship=Ship.name_id and Account.base=Base.base and Account.name='$user_check'";
		$fleet_ships2=$con->query($fleet_ships);
		$fleet_fleet = mysqli_fetch_assoc($fleet_ships2);
		echo "Your Current fleet: <B>" . $fleet_fleet ["fleet"] .
		"</B><br> ships: <B>" . $fleet_fleet["ship"] . "</B>";
		while($fleet_ships3 = $fleet_ships2->fetch_assoc()) {
			echo " <B> " . $fleet_ships3["ship"] . " </B> " ;
	}
        
    }	
}
?>
<?php

class Fleet_Ships {
	private $fleet_Ships;

	public function __construct($fleet_Ships) {
		$this->fleet_ships = $fleet_Ships;
	}

 	public function Ships_in_fleet() {
		include("./Api/sql_log.php");
		$user_check = $_SESSION['login_user'];
	
		$fleet_Ships = "select Fleet.fleet, Fleet.ship from Account, Fleet, Base, Ship where Base.fleet=Fleet.fleet and
		Fleet.ship=Ship.name_id and Account.base=Base.base and Account.name='$user_check'";
		$fleet_Ships2=$con->query($fleet_Ships);
		$fleet_fleet = mysqli_fetch_assoc($fleet_Ships2);
		echo "Your Current fleet: <B>" . $fleet_fleet ["fleet"] .
		"</B><br> ships: <B>" . $fleet_fleet["ship"] . "</B>";
		while($fleet_Ships3 = $fleet_Ships2->fetch_assoc()) {
			echo " <B> " . $fleet_Ships3["ship"] . " </B> " ;
	}
        
    }	
}
?>
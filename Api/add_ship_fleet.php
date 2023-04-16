<?php

class Addshipfleet {
	private $addshipfleet;

	public function __construct($addshipfleet) {
		$this->addshipfleet = $addshipfleet;
	}

	public function Addshipstofleet() {
		include("./Api/sql_log.php");
		$user_check = $_SESSION['login_user'];
	#Select all fleet ships 
		$addshipfleet = "SELECT Ticker.id,
        Ticker.tick, Ticker.player ,
        Ticker.building,
        Ticker.complete,
        Ticker.last_tick,
        Ticker.last_tick - Ticker.complete AS diffrence
        FROM   Ticker, Base, Account
        WHERE  Account.name = '$user_check'
        AND Ticker.player = Account. name
        AND Ticker.complete < Ticker.last_tick";
	#make query
		$addshipfleet2=$con->query($addshipfleet);
	#a lonk there are data -> display it on website
		#$fleetfleet = mysqli_fetch_assoc($addshipfleet2);
		echo "Waiting to add current ships to your fleet: " ;
		while($addshipfleet3 = $addshipfleet2->fetch_assoc()) {
			echo " <B> " . $addshipfleet3["building"] . " </B> " ;
	}
    #close current connection
	$addshipfleet2->close();    
    }	
}
?>
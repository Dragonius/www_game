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
		$addshipfleet = "SELECT ticker.id,
        ticker.tick, ticker.player ,
        ticker.building AS building,
        ticker.complete,
        ticker.last_tick,
        ticker.last_tick - ticker.complete AS diffrence
        FROM   ticker, base, account
        WHERE  account.name = '$user_check'
        AND ticker.player = account. name
        AND ticker.complete < ticker.last_tick";
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
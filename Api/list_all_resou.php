<?php

class Listallresou {
	private $listallresou;

	public function __construct($listallresou) {
		$this->listallresou = $listallresou;
	}

	public function Listallresou() {
		include("./Api/sql_log.php");
        $user_check = $_SESSION['login_user'];
	#list all resources
		$listallresou = "SELECT metal, fuel, money , diamond 
        FROM Base, Account 
        WHERE Account.name='$user_check' 
        AND Account.base=Base.base";
	#make query 
		$listallresou2=$con->query($listallresou);
	#as Long there is data -> display it on website
		while($listallresou3 = $listallresou2->fetch_assoc()) {
		echo "Your Current resources:
		Metal <B>" . $listallresou3["metal"]
        . "</B> Fuel <B>" . $listallresou3["fuel"]
        . "</B> Diamond <B>" . $listallresou3["diamond"]
        . "</B> Money <B>" . $listallresou3["money"]
        . "</B><br>" ;
	}
	#close current connection
	$listallresou2->close();
}
}
?>
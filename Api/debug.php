<?php

class Debug_data {
	private $Debug_data;

	public function __construct($Debug_data) {
		$this->Debug_data = $Debug_data;
	}

	public function Debugdata() {
		include("./sql_log.php");
		include('./../session.php');
		$user_check = $_SESSION['login_user'];
	
		echo "fetch2    " .	$fetch2['session'] . "<br>";
		echo "session2  " . $session2 . "<br>" ;
		echo "session3  " . $session3 . "<br>" ;
		$diff=$session3-$fetch2['session'];
		echo "Diffrence " . $diff . "<br>" ;
		echo "query2    " . $query2  . "<br>";
	
	}
	#close current connection

}
?>
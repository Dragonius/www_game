<?php
//debug data of session data
	include('session.php');
	echo "fetch2    " .	$fetch2['session'] . "<br>";
	echo "session2  " . $session2 . "<br>" ;
	echo "session3  " . $session3 . "<br>" ;
	$diff=$session3-$fetch2['session'];
	echo "Diffrence " . $diff . "<br>" ;
	
	echo "query2    " . $query2  . "<br>";

?>
<?php
#Jos pyydetaan Post muodossa tee nämä
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	#Dumpaa kaikki buy_ship sisältö
	var_dump($_POST['buy_ship']);
	var_dump($_POST['ship_prize']);
	#Linkitä Post Buy_ship muuttujaksi
	$buy_ship = ($_POST['buy_ship']);
	$ship_prize = ($_POST['ship_prize']);
//	$buy_avaible3sql=$i;
	#Tarkita mihin fleet kuuluu login_user
	//$query_buy= "INSERT INTO tzcrew.Fleet (`id`, `fleet`, `ship`, `damage`) VALUES ('', $fetch_buy, $buy_avaible3[0], '0') where Account.base=Base.base and Base.fleet=Fleet.fleet and Account.name='$user_check'";
	$query_buy= "INSERT INTO Fleet(fleet, ship, damage) VALUES ('fleet1', '$buy_ship', '0') ";
	$query_cash=Select Base.money from Base, Account where Account.base=Base.base and Account.name='$user_check';
	$result_prize=$con->query($query_cash);
	$result_prize=$result_prize-$ship_prize;
	//$query_takecash=update Base.money from Ship, Base, Account where Account.base=Base.base and Account.name='$user_check'";
	#make query 
	$result_buy=$con->query($query_buy);
	//$fetch_buy = mysqli_fetch_assoc($result_buy);
	//$name_buy = $fetch_buy["fleet"];
	#Debug only
	//echo $buy_ship . "<font color=green> $result_buy " . $result_buy . "</font><brr><font color=red>" , $query_buy , "</font><br>";
	#Move user to back buy page
	header("location: buy.php");
	}
else {
	header("location: welcome.php");
	}
	?>

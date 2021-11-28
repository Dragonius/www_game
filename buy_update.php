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
	#var_dump($_POST['buy_ship']);
	#var_dump($_POST['ship_prize']);
	#Linkitä Post Buy_ship muuttujaksi
	$buy_ship = ($_POST['buy_ship']);
	#Hae Ship_fleet
	$ship_fleet= ($_POST['ship_fleet']);
	#Need to converter to Int
	#$ship_prize = ($_POST['ship_prize']);
	#If ship_prize is number, covenrt to int
	$ship_prize = (is_numeric($_POST['ship_prize']) ? (int)$_POST['ship_prize'] : 0);
	#Check what fleet user is in  login_user
	//$query_buy= "INSERT INTO tzcrew.Fleet (`id`, `fleet`, `ship`, `damage`) VALUES ('', $fetch_buy, $buy_avaible3[0], '0') where Account.base=Base.base and Base.fleet=Fleet.fleet and Account.name='$user_check'";
	#2020 Check what fleet user namehave
	//select tzcrew.Account.name, tzcrew.Account.base, Base.base, Fleet.fleet FROM Account,Base,Fleet WHERE  Account.name='$user_check' && Account.base=Base.base && Base.fleet=Fleet.fleet LIMIT 1;
	#no fleet check just query against username
	$query_buy= "INSERT INTO Fleet(fleet, ship, damage) VALUES ('$ship_fleet', '$buy_ship', '0') ";
	$query_cash="Select Base.money from Base, Account where Account.base=Base.base and Account.name='$user_check'";
	$result_current_cash=$con->query($query_cash);
	#need to conversion to int 
	$count = $result_current_cash->fetch_assoc();               
	$result_current_cash = $count['money'] ;
	#end of conversion
	#remove money
	$result_prize=$result_current_cash-$ship_prize;
	#Make right Query againstst "username"
	$query_takecash="UPDATE Base INNER JOIN Account ON Base.base=Account.base SET Base.money='$result_prize' where Account.name='$user_check'";
	#make query 
	$result_cash=$con->query($query_takecash);
	#make query 
	$result_buy=$con->query($query_buy);
	#Move user to back buy page
	header("location: buy.php");
	}
else {
	header("location: welcome.php");
	}
	?>

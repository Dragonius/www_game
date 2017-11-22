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
	//var_dump($_POST['build_ship']);
	//var_dump($_POST['prize_metal']);
	//var_dump($_POST['prize_fuel']);
	//var_dump($_POST['prize_diamond']);	
	#Linkitä Post Buy_ship muuttujaksi
	$build_ship = ($_POST['build_ship']);
	#Need to converter to Int
	#$ship_prize = ($_POST['ship_prize']);
	#If ship_prize is number, covenrt to int
	$prize_metal = (is_numeric($_POST['prize_metal']) ? (int)$_POST['prize_metal'] : 0);
	$prize_fuel = (is_numeric($_POST['prize_fuel']) ? (int)$_POST['prize_fuel'] : 0);
	$prize_diamond = (is_numeric($_POST['prize_diamond']) ? (int)$_POST['prize_diamond'] : 0);
	//echo $prize_metal,"<br>";
	//echo $prize_fuel,"<br>";
	//echo $prize_diamond,"<br>";
	//echo $build_ship,"<br>";
	$query_metal="Select Base.metal from Base, Account where Account.base=Base.base and Account.name='$user_check'";
	$result_current_metal=$con->query($query_metal);
	#need to conversion to int 
	$count = $result_current_metal->fetch_assoc();               
	$result_current_metal = $count['metal'] ;
	#end of conversion
	#remove metal
	$result_metal=$result_current_metal-$prize_metal;
	#Make right Query againstst "username"
	$query_takemetal="UPDATE Base INNER JOIN Account ON Base.base=Account.base SET Base.metal='$result_metal' where Account.name='$user_check'";
	#make query 
	$result_metal=$con->query($query_takemetal);
	$query_fuel="Select Base.fuel from Base, Account where Account.base=Base.base and Account.name='$user_check'";
	$result_current_fuel=$con->query($query_fuel);
	#need to conversion to int 
	$count = $result_current_fuel->fetch_assoc();               
	$result_current_fuel = $count['fuel'] ;
	#end of conversion
	#remove fuel
	$result_fuel=$result_current_fuel-$prize_fuel;
	#Make right Query againstst "username"
	$query_takefuel="UPDATE Base INNER JOIN Account ON Base.base=Account.base SET Base.fuel='$result_fuel' where Account.name='$user_check'";
	#make query 
	$result_fuel=$con->query($query_takefuel);
	$query_diamond="Select Base.diamond from Base, Account where Account.base=Base.base and Account.name='$user_check'";
	$result_current_diamond=$con->query($query_diamond);
	#need to conversion to int 
	$count = $result_current_diamond->fetch_assoc();               
	$result_current_diamond = $count['diamond'] ;
	#end of conversion
	#remove diamond
	$result_diamond=$result_current_diamond-$prize_diamond;
	#Make right Query againstst "username"
	$query_takediamond="UPDATE Base INNER JOIN Account ON Base.base=Account.base SET Base.diamond='$result_diamond' where Account.name='$user_check'";
	#make query 
	#Add ship to build, Ticks needed would come as building cost -> Bigger -> Longer to build
	#Metal , fuel Diamond, Metal 1x fuel 0.5x Diamond 2x
	$result_diamond=$con->query($query_takediamond);
	#add ticket check and when ticket < Time add ship player list
	#sql add > tick check -> Tick update -> if -> add , Ifnot -> skip
	#Move user to back buy page
//header("location: build.php");
}
else {
	header("location: welcome.php");
}
	?>
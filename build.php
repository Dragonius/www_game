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
<?php echo "<html><head><title>Welcome to Buy Ships</title></head><body><h1>Welcome" . $login_session . "</h1>";

	#list all resources
	$resources = "SELECT metal, fuel, money , diamond FROM Base, Account 
	WHERE Account.name='$user_check' and Account.base=Base.base";
	#make query 
	$resources2=$con->query($resources);
	#as Long there is data -> display it on website
	while($resources3 = $resources2->fetch_assoc()) {
		echo "Your Current resources: Metal <B>" . $resources3["metal"] . "</B> Fuel <B>" . $resources3["fuel"] . 
		"</B> Diamond <B>" . $resources3["diamond"] . "</B> Money <B>" . $resources3["money"]	. "</B><br>" ;
	}
	#close current connection
	$resources2->close();
	echo "<h2>Ships that you can build</h2>";
	#list all ships that user can build
	$build_avaible = "Select name_id, firepower, shield, hull, prize_metal, prize_fuel, prize_diamond,
	prize_cash from Ship, Base, Account 
	where Account.base=Base.base  and Base.metal>=Ship.prize_metal and Base.diamond>=Ship.prize_diamond
	and Base.fuel>=Ship.prize_fuel and Account.name='$user_check'";
	#make query 
	$build_avaible2=$con->query($build_avaible);
	#build table where sql data comes
	echo "<table border=1><tr><td>Avaible Ships: </td><td>Firepower</td><td>Shield</td><td>Hull</td>
	<td>Metal</td><td>Fuel</td><td>Diamond</td><td>Cash</td>\t";
	#as Long there is data -> display it on website
	while($build_avaible3 = $build_avaible2->fetch_row()) {
	echo "<tr><td>
	<form action ='build_update.php'  method = 'POST'>"
	. $build_avaible3[0] . "</td><td>" . $build_avaible3[1] . "</td><td>" . $build_avaible3[2] .	"</td><td>" 
	. $build_avaible3[3] . "</td><td>" . $build_avaible3[4] . "</td><td>" . $build_avaible3[5] . "</td><td>" 
	. $build_avaible3[6] . "</td><td>" . $build_avaible3[7] . "</td><td>
	<input type='hidden' name='prize_metal' value='$build_avaible3[4]'>
	<input type='hidden' name='prize_fuel' value='$build_avaible3[5]'>
	<input type='hidden' name='prize_diamond' value='$build_avaible3[6]'>
	<input type='submit' name='build_ship' value='$build_avaible3[0]'></form></td></tr>";
	}
	echo "</tr></table>";
	#close current connection	
	$build_avaible2->close();
?>
<!-- Import Links -->
	<h2><a href="welcome.php">Welcome link</a></h2>
	<h2><a href="buy.php">Buy link</a></h2>
	<h2><a href="logout.php">Sign Out</a></h2>
   </body>
   
</html>

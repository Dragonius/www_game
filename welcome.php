<?php
	include('session.php');
	echo "fetch2    " .	$fetch2['session'] . "<br>";
	echo "session2  " . $session2 . "<br>" ;
	echo "session3  " . $session3 . "<br>" ;
	$diff=$session3-$fetch2['session'];
	echo "Diffrence " . $diff . "<br>" ;
	
	echo "query2    " . $query2  . "<br>";

?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
	<body>
	<h1>Welcome <?php echo $login_session; ?></h1>
	<?php
	$resources = "SELECT metal, fuel, money , diamond FROM Base, Account 
	WHERE Account.name='$user_check' and Account.base=Base.base";
	$resources2=$con->query($resources);
	while($resources3 = $resources2->fetch_assoc()) {
		echo "Your Current resources: Metal <B>" . $resources3["metal"] . "</B> Fuel <B>" . $resources3["fuel"] . 
		"</B> Diamond <B>" . $resources3["diamond"] . "</B> Money <B>" . $resources3["money"]	. "</B><br>" ;
	}
	$fleet_ships = "select Fleet.fleet, Fleet.ship from Account, Fleet, Base, Ship where Base.fleet=Fleet.fleet and 
	Fleet.ship=Ship.name_id and Account.base=Base.base and Account.name='$user_check'";
	$fleet_ships2=$con->query($fleet_ships);
	$fleet_fleet = mysqli_fetch_assoc($fleet_ships2);
	echo "Your Current fleet: <B>" . $fleet_fleet ["fleet"] . "</B> ships: <B>" . $fleet_fleet["ship"] . "</B>"; 
	while($fleet_ships3 = $fleet_ships2->fetch_assoc()) {
		echo " <B> " . $fleet_ships3["ship"] . " </B> " ;
	}
		?>
	<h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
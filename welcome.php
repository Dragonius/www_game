<?php
	include('session.php');
	include('./Api/fleet_ships.php');
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
	//	Ships_in_fleet()
	$ships = new fleetships("ships");
	$ships->Shipsinfleet();
	?>
	<h2><a href = "build.php">Build link</a></h2>
	<h2><a href = "buy.php">Buy link</a></h2>
	<h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

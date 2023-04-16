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
<html>

	<head>
	<title>Add builded ships to player<</title>
	</head>
	<body>
    <h1>Welcome <?php echo $login_session; ?></h1>
	<!-- Import Links -->
	<h2><a href="welcome.php">Welcome link</a></h2>
	<h2><a href="buy.php">Buy link</a></h2>
	<h2><a href="logout.php">Sign Out</a></h2>
<?php
    #list all resources
    $resources = "SELECT metal, fuel, money , diamond FROM Base, Account 
    WHERE Account.name='$user_check' and Account.base=Base.base";
    $resources2=$con->query($resources);
    while($resources3 = $resources2->fetch_assoc()) {
        echo "Your Current resources: Metal <B>" . $resources3["metal"] . "</B> Fuel <B>" . $resources3["fuel"] . 
        "</B> Diamond <B>" . $resources3["diamond"] . "</B> Money <B>" . $resources3["money"]    . "</B><br>" ;
    }
    #close current connection
    $resources2->close();
?>
	<h2> Here Read ships to delivery</h2>";
	<?php 
	#list all builded ships
	$build_ready = "SELECT * FROM Ticker where complete < last_tick";
	#make query 
	$build_ready2=$con->query($build_ready);
	#as Long there is data -> display it on website
	while($build_ready3 = $build_ready2->fetch_assoc()) {
		echo "ID <B>" . $build_ready3["id"] . "</B> Tick <B>" . $build_ready3["tick"] . 
		"</B> Player <B>" . $build_ready3["player"] . "</B> Build <B>" . $build_ready3["building"]	. 
		"</B> Complete <B>" . $build_ready3["complete"]	. "</B> Last Tick <B>" . $build_ready3["last_tick"]	. "</B><br>" ;
		#$add_ship=INSERT INTO Fleet(fleet, ship, damage) VALUES ('fleet1', 'building', '0');
		$build_ready2=$con->query($build_ready);
	}
	#close current connection
	$build_ready2->close();
	
	echo "<h2>Not Ready yet ships</h2>";
	#list all builded ships
	$build_ready = "SELECT * FROM Ticker where complete > last_tick";
	#make query 
	$build_ready2=$con->query($build_ready);
	#as Long there is data -> display it on website
	while($build_ready3 = $build_ready2->fetch_assoc()) {
		echo "ID <B>" . $build_ready3["id"] . "</B> Tick <B>" . $build_ready3["tick"] . 
		"</B> Player <B>" . $build_ready3["player"] . "</B> Build <B>" . $build_ready3["building"]	. 
		"</B> Complete <B>" . $build_ready3["complete"]	. "</B> Last Tick <B>" . $build_ready3["last_tick"]	. "</B><br>" ;
	}
	#close current connection
	$build_ready3->close();
	
	#SELECT DISTINCT Fleet.fleet, Ticker.building   
	#FROM Ticker,Account,Base,Fleet 
	#where Ticker.complete <= Ticker.last_tick and Ticker.player=Account.name and Account.base=Base.base 
	#and Base.fleet=Fleet.fleet and Ticker.building!='';
?>

</body>

</html>



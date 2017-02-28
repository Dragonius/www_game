<?php
	include('session.php');
	echo "fetch2    " .	$fetch2['session'] . "<br>";
	echo "session2  " . $session2 . "<br>" ;
	echo "session3  " . $session3 . "<br>" ;
	$diff=$session3-$fetch2['session'];
	echo "Diffrence " . $diff . "<br>" ;
	
	echo "query2    " . $query2  . "<br>";

?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
// 	Tarkita mihin fleet kuuluu login_user
	$query_buy= "select DISTINCT  Fleet.fleet from Account, Base, Fleet where Account.base=Base.base and Base.fleet=Fleet.fleet and Account.name='$user_check'";
	$result_buy=$con->query($query_buy);
	$fetch_buy = mysqli_fetch_assoc($result_buy);
	$name_buy = $fetch_buy["fleet"];
	INSERT INTO tzcrew.Fleet (`id`, `fleet`, `ship`, `damage`) VALUES ('', $fetch_buy, $buy_avaible3[0], '0')
	}
?>
<html>
   
   <head>
      <title>Welcome to Buy Ships</title>
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
	$resources2->close();
?>
        <h2>Ships that you can buy</h2>
        <?php
        $buy_avaible = "Select name_id, firepower, shield, hull, prize_metal, prize_fuel, prize_diamond,
        prize_cash from Ship, Base, Account
        where Account.base=Base.base  and Base.money>=Ship.prize_cash and Account.name='$user_check'";
        $buy_avaible2=$con->query($buy_avaible);
        echo "<table border=1><tr><td>Avaible Ships: </td><td>Firepower</td><td>Shield</td><td>Hull</td>
        <td>Metal</td><td>Fuel</td><td>Diamond</td><td>Cash</td>\t";
        while($buy_avaible3 = $buy_avaible2->fetch_row()) {
        echo "<tr><td>"
        . $buy_avaible3[0] . "</td><td>" . $buy_avaible3[1] . "</td><td>" . $buy_avaible3[2] .  "</td><td>"
        . $buy_avaible3[3] . "</td><td>" . $buy_avaible3[4] . "</td><td>" . $buy_avaible3[5] . "</td><td>"
        . $buy_avaible3[6] . "</td><td>" . $buy_avaible3[7] . "</td><td><input type ='submit' value = 'buy'/></td></tr>" ;
        }
        echo "</tr></table>";
	$buy_avaible2->close();
?>	
	<h2><a href="welcome.php">Welcome link</a></h2>
	<h2><a href="build.php">Build link</a></h2>
	<h2><a href="logout.php">Sign Out</a></h2>
   </body>
   
</html>

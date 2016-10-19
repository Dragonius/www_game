<html>

<head><title>Asemble Base</title></head>
<body>


<?php
include 'sql_log.php';
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
echo $con->host_info . "\n";

echo "<br>";
$sql = "SELECT id, name_id, firepower, shield, hull, shield_rege, hull_rege, prize_metal, prize_fuel, prize_diamond, prize_cash FROM tzcrew.Ship ORDER BY prize_cash DESC, prize_metal , prize_fuel";
$result = $con->query($sql);
echo "<table border=1>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>id: " . $row["id"]. "</td><td>Name: " . $row["name_id"]. "</td><td>Firepower:  " . $row["firepower"].  
		"</td><td>Shield:  " . $row["shield"]. "</td><td>Hull: " . $row["hull"]. "</td><td>Shield Regeneration:  " . $row["shield_rege"].
		"</td><td>Hull Regeneration: " . $row["hull_rege"]. "</td><td>Prize metal : " . $row["prize_metal"]. 
		"</td><td>Prize fuel:  " . $row["prize_fuel"]."</td><td>Prize Diamond:  " . $row["prize_diamond"].
		"</td><td>Prize Cash:  " . $row["prize_cash"]. "</td></tr>";
	//Make Variables from row data
	$id=$row["id"];
	$hull=$row["hull"];
	$firepower=$row["firepower"];
	$shield=$row["shield"];
	$shield_rege=$row["shield_rege"];
	$hull_rege=$row["hull_rege"];
	$prize_diamond=$row["prize_diamond"];
	$prize_cash=$row["prize_cash"];
	$prize_fuel=$hull/2 *$hull_rege + $firepower + $shield * $shield_rege;
	$prize_metal=$hull * $hull_rege + $firepower/2 + $shield/2 * $shield_rege;
	$prize_diamond=($hull * $shield) * (($hull_rege +$shield_rege)/2) + $firepower;
	$prize_cash=($hull * $hull_rege + $firepower + $shield * $shield_rege) * $prize_diamond; 
	/*
	Print all stats and update them calc cost
	echo "<br> prize_metal ", $prize_metal, " prize_fuel ", $prize_fuel," hull ", $hull," firepower ", $firepower," shield ", $shield ,
	" id ", $id, "<br>";
	*/
	$sql2 = "UPDATE tzcrew.Ship SET prize_fuel='$prize_fuel' WHERE  id=$id";
	$sql3 = "UPDATE tzcrew.Ship SET prize_metal='$prize_metal' WHERE  id=$id";
	$sql4 = "UPDATE tzcrew.Ship SET prize_diamond='$prize_diamond' WHERE  id=$id";
	$sql5 = "UPDATE tzcrew.Ship SET prize_cash='$prize_cash' WHERE  id=$id";
	$con->query($sql2);
	$con->query($sql3);
	$con->query($sql4);
	$con->query($sql5);
    }
} else {
    echo "Ship 0 results";
}
echo "</table><br>";

mysqli_close($con);
?>
</body>
</html> 
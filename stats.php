<?php
ob_start("ob_gzhandler");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<html>

<head><title>Asemble Base</title></head>
<body>


<?php
#take time and mem usage
$time = microtime(TRUE);
$mem = memory_get_usage();


include 'sql_log.php';
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
echo $con->host_info . "\n";
echo "<br>";

$sql = "SELECT id, name, pass, base, session FROM tzcrew.Account ORDER BY id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Pass:  " . $row["pass"].  " - Base:  " . $row["base"].
		 " - Session:  " . $row["session"]."<br>";
    }
} else {
    echo "Account 0 results";
}
echo "<br>";

$sql = "SELECT id, base, fleet, metal, fuel, region ,galaxy FROM tzcrew.Base ORDER BY base";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Base: " . $row["base"]. " - Fleet:  " . $row["fleet"].
		" - Metal:  " . $row["metal"]." - Fuel:  " . $row["fuel"]." - Region:  " . $row["region"]." - Galaxy:  " . $row["galaxy"]."<br>";
    }
} else {
    echo "Base 0 results";
}
echo "<br>";

$sql = "SELECT id, fleet, ship, damage FROM tzcrew.Fleet ORDER BY fleet";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Fleet: " . $row["fleet"]. " - Ship:  " . $row["ship"].  " - Damage:  " . $row["damage"]."<br>";
    }
} else {
    echo "Fleet 0 results";
}
echo "<br>";

$sql = "SELECT id, name_id, firepower, shield, hull, shield_rege, hull_rege, prize_metal, prize_fuel, prize_diamond, prize_cash FROM tzcrew.Ship ORDER BY id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name_id"]. " - Firepower:  " . $row["firepower"].  " - Shield:  " . $row["shield"].
		" - Hull: " . $row["hull"]. " - Shield Regeneration:  " . $row["shield_rege"].  " - Hull Regeneration: " . $row["hull_rege"].
		"- Prize metal : " . $row["prize_metal"]. " - Prize fuel:  " . $row["prize_fuel"].
		"- Prize diamond : " . $row["prize_diamond"]. " - Prize cash:  " . $row["prize_cash"]."<br>";
    }
		$sql2 = "Show session Status like 'Last_query_cost'";
	$result2 = $con->query($sql2);
	while($row = $result2->fetch_assoc()) {
			echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}
} else {
    echo "Ship 0 results";
}
echo "<br>";

$sql = "SHOW SESSION STATUS LIKE 'Questions'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}	
	$sql2 = "Show session Status like 'Last_query_cost'";
	$result2 = $con->query($sql2);
	while($row = $result2->fetch_assoc()) {
			echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}
} else {
    echo "No Questions";
}
echo "<br>";

printf("System status: %s\n", mysqli_stat($con));

mysqli_close($con);

#output time and mem usage
echo	"<br>memory_get_peak_usage: ", number_format((memory_get_peak_usage(false)/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>memory usage: ", number_format((memory_get_usage()/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>memory diff usage: ", number_format(((memory_get_usage() - $mem)/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>seconds: ", number_format(microtime(TRUE) - $time, 4, '.', ',');
ob_end_flush();
?>
</body>
</html>
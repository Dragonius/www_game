<?php
//ob_start("ob_gzhandler");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<html>

<head><title>Asemble Base</title></head>
<body>


<?php
#take time 
$time = microtime(TRUE);
#take mem usage
$mem = memory_get_usage();

#include sql login details
include('./Api/sql_log.php');
#make connection to server
$con = new mysqli($servername, $username, $password, $dbname);
#test Errors on connection
if ($con->connect_errno) {
	#If connection failed , print error
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
#Echo connection info
echo $con->host_info . "\n<br>";
#Make query about accounts 
$sql = "SELECT id, name, pass, base, session FROM tzcrew.Account ORDER BY id";
#Run query
$result = $con->query($sql);
# Test result count and if more than 0 then run query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		#echo output
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Pass:  " . $row["pass"].  " - Base:  " . $row["base"].
		 " - Session:  " . $row["session"]."<br>";
    }
#If no data 
} else {
	#echo No data
    echo "Account 0 results";
}
#Line break
echo "<br>";
#Make new query about id, base, fleet, metal, fuel, region ,galaxy
$sql = "SELECT id, base, fleet, metal, fuel, region ,galaxy FROM tzcrew.Base ORDER BY base";
#Run query
$result = $con->query($sql);
# Test result count and if more than 0 then run query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Base: " . $row["base"]. " - Fleet:  " . $row["fleet"].
		" - Metal:  " . $row["metal"]." - Fuel:  " . $row["fuel"]." - Region:  " . $row["region"]." - Galaxy:  " . $row["galaxy"]."<br>";
    }
#If no data 
} else {
	#echo No data
    echo "Base 0 results";
}
echo "<br>";
#Make new query about id, fleet, ship, damage
$sql = "SELECT id, fleet, ship, damage FROM tzcrew.Fleet ORDER BY fleet";
#Run query
$result = $con->query($sql);
# Test result count and if more than 0 then run query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Fleet: " . $row["fleet"]. " - Ship:  " . $row["ship"].  " - Damage:  " . $row["damage"]."<br>";
    }
#If no data 
} else {
	#echo No data
    echo "Fleet 0 results";
}
echo "<br>";
#Make new query about id, name_id, firepower, shield, hull, shield_rege, hull_rege, prize_metal, prize_fuel, prize_diamond, prize_cash 
$sql = "SELECT id, name_id, firepower, shield, hull, shield_rege, hull_rege, prize_metal, prize_fuel, prize_diamond, prize_cash FROM tzcrew.Ship ORDER BY id";
#Run query
$result = $con->query($sql);
# Test result count and if more than 0 then run query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name_id"]. " - Firepower:  " . $row["firepower"].  " - Shield:  " . $row["shield"].
		" - Hull: " . $row["hull"]. " - Shield Regeneration:  " . $row["shield_rege"].  " - Hull Regeneration: " . $row["hull_rege"].
		"- Prize metal : " . $row["prize_metal"]. " - Prize fuel:  " . $row["prize_fuel"].
		"- Prize diamond : " . $row["prize_diamond"]. " - Prize cash:  " . $row["prize_cash"]."<br>";
    }
	#Show Cost of last query
	$sql2 = "Show session Status like 'Last_query_cost'";
	#Run query
	$result2 = $con->query($sql2);
	while($row = $result2->fetch_assoc()) {
			echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}
#If no data 
} else {
	#echo No data
    echo "Ship 0 results";
}
echo "<br>";
#SHOW SESSION STATUS LIKE 'Questions'
$sql = "SHOW SESSION STATUS LIKE 'Questions'";
#Run query
$result = $con->query($sql);
# Test result count and if more than 0 then run query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}
	#Show Cost of last query
	$sql2 = "Show session Status like 'Last_query_cost'";
	#Run query
	$result2 = $con->query($sql2);
	while($row = $result2->fetch_assoc()) {
			echo "Variable name: " . $row["Variable_name"]. " - Value: " . $row["Value"]."<br>";
	}
} else {
    echo "No Questions";
}
echo "<br>";
#Print System Status
printf("System status: %s\n", mysqli_stat($con));

mysqli_close($con);

#output time and mem usage
echo	"<br>memory_get_peak_usage: ", number_format((memory_get_peak_usage(false)/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>memory usage: ", number_format((memory_get_usage()/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>memory diff usage: ", number_format(((memory_get_usage() - $mem)/1024/1024), 3, '.', ',')." MiB\n";
echo	"<br>seconds: ", number_format(microtime(TRUE) - $time, 4, '.', ',');
//ob_end_flush();
?>
</body>
</html>
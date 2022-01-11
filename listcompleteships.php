<<<<<<< HEAD
<?php
//debug data of session data
    include('session.php');
    echo "fetch2    " .    $fetch2['session'] . "<br>";
    echo "session2  " . $session2 . "<br>" ;
    echo "session3  " . $session3 . "<br>" ;
    $diff=$session3-$fetch2['session'];
    echo "Diffrence " . $diff . "<br>" ;
    echo "query2    " . $query2  . "<br>";

?>
<html>
   
   <head>
      <title>List complete ships</title>
   </head>
       <body>
    <h1>Welcome <?php echo $login_session; ?></h1>
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
    <h2>List Ships that Need to transfere</h2>
    <?php
    #list all ships that user can buy
    $list_complete_ships = "select tzcrew.Ticker.id AS id,tzcrew.Ticker.tick AS tick,tzcrew.Ticker.player AS player,tzcrew.Ticker.building AS building,
tzcrew.Ticker.complete AS complete,tzcrew.Ticker.last_tick AS last_tick from tzcrew.Ticker where (tzcrew.Ticker.complete < tzcrew.Ticker.last_tick)";
    #make query 
    $list_complete_ships2=$con->query($list_complete_ships);
    echo "<table border=1><tr><td>Id</td><td>Avaible Ships: </td><td>User</td><td>Name</td><td>Tick_complete</td>
    <td>Current_Tick</td>\t";
    $i=0;
        while($list_complete_ships3 = $list_complete_ships2->fetch_row()) {
        echo "<tr><td>
        <form action ='buy_update.php'  method = 'POST'>"
        . $list_complete_ships3[0] . "</td><td>" . $list_complete_ships3[1] . "</td><td>" . $list_complete_ships3[2] .  "</td><td>"
        . $list_complete_ships3[3] . "</td><td>" . $list_complete_ships3[4] . "</td><td>" . $list_complete_ships3[5] . "</td>";
        $i++;
        }
    //if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$list_complete_ships3sql=$i; 
    #Tarkita mihin fleet kuuluu login_user
    //$query_buy= "INSERT INTO tzcrew.Fleet (id, fleet, ship, damage) VALUES ('', $fetch_buy, $list_complete_ships3[0], '0') where Account.base=Base.base and Base.fleet=Fleet.fleet and Account.name='$user_check'";
    //$query_buy= "INSERT INTO Fleet(fleet, ship, damage) VALUES ('fleet1', '$list_complete_ships3sql', '0') ";
    //$query_takecash=
    #make query 
    //$result_buy=$con->query($query_buy);
    //$fetch_buy = mysqli_fetch_assoc($result_buy);
    //$name_buy = $fetch_buy["fleet"];
    //echo "<font color=green> $result_buy " ,$result_buy , "</font><font color=red> $query_buy " , $query_buy , "</font><br>";
    //}
    echo "</tr></table>";
//close current connection    
    $list_complete_ships2->close();


?>
<!-- Import Links -->
    <h2><a href="welcome.php">Welcome link</a></h2>
    <h2><a href="build.php">Build link</a></h2>
    <h2><a href="logout.php">Sign Out</a></h2>
   </body>
 
</html>
=======
<?php
//debug data of session data
    include('session.php');
    echo "fetch2    " .    $fetch2['session'] . "<br>";
    echo "session2  " . $session2 . "<br>" ;
    echo "session3  " . $session3 . "<br>" ;
    $diff=$session3-$fetch2['session'];
    echo "Diffrence " . $diff . "<br>" ;
    echo "query2    " . $query2  . "<br>";

?>
<html>
   
   <head>
      <title>List complete ships</title>
   </head>
       <body>
    <h1>Welcome <?php echo $login_session; ?></h1>
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
    <h2>List Ships that Need to transfere</h2>
    <?php
    #list all ships that user can buy
    $list_complete_ships = "select tzcrew.Ticker.id AS id,tzcrew.Ticker.tick AS tick,tzcrew.Ticker.player AS player,tzcrew.Ticker.building AS building,
tzcrew.Ticker.complete AS complete,tzcrew.Ticker.last_tick AS last_tick from tzcrew.Ticker where (tzcrew.Ticker.complete < tzcrew.Ticker.last_tick)";
    #make query 
    $list_complete_ships2=$con->query($list_complete_ships);
    echo "<table border=1><tr><td>Id</td><td>Avaible Ships: </td><td>User</td><td>Name</td><td>Tick_complete</td>
    <td>Current_Tick</td>\t";
    $i=0;
        while($list_complete_ships3 = $list_complete_ships2->fetch_row()) {
        echo "<tr><td>
        <form action ='buy_update.php'  method = 'POST'>"
        . $list_complete_ships3[0] . "</td><td>" . $list_complete_ships3[1] . "</td><td>" . $list_complete_ships3[2] .  "</td><td>"
        . $list_complete_ships3[3] . "</td><td>" . $list_complete_ships3[4] . "</td><td>" . $list_complete_ships3[5] . "</td>";
        $i++;
        }
    //if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$list_complete_ships3sql=$i; 
    #Tarkita mihin fleet kuuluu login_user
    //$query_buy= "INSERT INTO tzcrew.Fleet (id, fleet, ship, damage) VALUES ('', $fetch_buy, $list_complete_ships3[0], '0') where Account.base=Base.base and Base.fleet=Fleet.fleet and Account.name='$user_check'";
    //$query_buy= "INSERT INTO Fleet(fleet, ship, damage) VALUES ('fleet1', '$list_complete_ships3sql', '0') ";
    //$query_takecash=
    #make query 
    //$result_buy=$con->query($query_buy);
    //$fetch_buy = mysqli_fetch_assoc($result_buy);
    //$name_buy = $fetch_buy["fleet"];
    //echo "<font color=green> $result_buy " ,$result_buy , "</font><font color=red> $query_buy " , $query_buy , "</font><br>";
    //}
    echo "</tr></table>";
//close current connection    
    $list_complete_ships2->close();


?>
<!-- Import Links -->
    <h2><a href="welcome.php">Welcome link</a></h2>
    <h2><a href="build.php">Build link</a></h2>
    <h2><a href="logout.php">Sign Out</a></h2>
   </body>
 
</html>
>>>>>>> caa89ea481ed0e7c89b97368d8e1b0a9d6aeb630

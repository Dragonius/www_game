<?php
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
    ?>
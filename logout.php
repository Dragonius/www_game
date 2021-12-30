<?php
session_start();
//Destroy session, No tested yet beacuse of 5 min timer

//ifnot current session, redicert user to main page
   if(session_destroy()) {
      header("Location: login.php");
   }

?>
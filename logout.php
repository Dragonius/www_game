<?php
//Destroy session, No tested yet beacuse of 5 min timer
   session_start();
//ifnot current session, redicert user to main page
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
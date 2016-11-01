<?php
   session_start();
   //destroy session 
   if(session_destroy()) {
      //redict user ot login page
      header("Location: login.php");
   }
?>

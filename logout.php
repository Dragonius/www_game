<<<<<<< HEAD
<?php
session_start();
//Destroy session, No tested yet beacuse of 5 min timer

//ifnot current session, redicert user to main page
   if(session_destroy()) {
      header("Location: login.php");
   }

=======
<?php
session_start();
//Destroy session, No tested yet beacuse of 5 min timer

//ifnot current session, redicert user to main page
   if(session_destroy()) {
      header("Location: login.php");
   }

>>>>>>> 20a6d7934d583cab22eb69a38878c7021576e9f6
?>
<?php 

//Start session, unset variables, and end session
session_start();
session_unset();
session_destroy();
    


header("Location: ../login.php");
?>
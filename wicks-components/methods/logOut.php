<?php 

//Start session and check logon status
session_start();
if (isset($_SESSION['loggedon'])) {
    $_SESSION['loggedon'] = NULL;
    $loggedon = FALSE;
    session_unset();
    session_destroy();
    
}
else {
	$loggedon = FALSE;
}

header("Location: ../login.php");
?>
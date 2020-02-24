<?php 

//Start session and check logon status
session_start();
if (isset($_SESSION['loggedon'])) {
    $_SESSION['loggedon'] = NULL;
    $loggedon = FALSE;
}
else {
	$loggedon = FALSE;
}

header("Location: ./login.php");
?>
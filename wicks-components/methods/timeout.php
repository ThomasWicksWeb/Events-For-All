<?php

//begin timeout
$timeout = 1200; // Number of seconds until it times out.
 
// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
        session_start();
        echo "<script>alert('Sorry, but your session has timed out.');</script>";
        echo "<script> window.setTimeout(function() {window.location.replace('./methods/logOut.php');}, 1*1000);</script>";
    }
}
 
$checkTime = time();
echo "$checkTime <br>";
var_dump($checkTime);

// Update the timout field with the current time.
$_SESSION['timeout'] = time();
// end timeout


?>
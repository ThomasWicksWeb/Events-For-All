<?php 

//Start session and check logon status
session_start();
require './functions.php';

if (isset($_SESSION['loggedon'])) {
	$loggedon = $_SESSION['loggedon'];
}
else {
    $loggedon = FALSE;
    
}

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $userID = (int)$userID;
}
else {
	$userID = NULL;
}

if (isset($_GET['joinEventID'])) {
    $eventID = $_GET['joinEventID'];
    $eventID = (int)$eventID;
}
else {
	$eventID = NULL;
}


if (($loggedon) && ($userID != NULL) && ($eventID != NULL)) {

    // Connect to MySQL and the EventsForAll Database
    require './databaseConnection.php';

    if ($mysqli->connection_error) {
        die("connection Failed: " . $mysqli->connection_error);
        echo "<script>console.log('Connection Error...')</script>";
        }
        else {
        echo "<script>console.log('Connected successfully...')</script>";
        }

    $joinQuery = "INSERT INTO Attendees(eventID, userID) VALUES($eventID, $userID)";
    if($mysqli->query($joinQuery) === TRUE) {
        $message = "Event Joined Successfully!";
        $_SESSION['message'] = $message;
        header("Location: ../systemMessage.php?routed=5&eventID=$eventID");
    }
}
else {
    $message = "Event Joined Successfully!";
    $_SESSION['errorMessage'] = $message;
    header("Location: ../erorr.php?routed=5&eventID=$eventID");
}
$mysqli->close();

?>
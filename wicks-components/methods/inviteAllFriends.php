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

if (isset($_POST['eventID'])) {
    $eventID = $_POST['eventID'];
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

    // Query database for friendships
$query = "SELECT friend1userID, friend2userID FROM Friendships WHERE friend1userID = '$userID' OR friend2userID = '$userID'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
 $i = 0;
 $friendlist = array();
// output data of each row
while($row = $result->fetch_assoc()) {
   $friend1userID = $row["friend1userID"]; 
   $friend2userID = $row["friend2userID"];
   if ($friend1userID === $userID) {
   $friendlist[$i] = $friend2userID;
    }
   else {
   $friendlist[$i] = $friend1userID;
   }
   $i++;
}

foreach($friendlist as $friend) {
    $joinQuery = "INSERT INTO Invitees(eventID, userID) VALUES($eventID, $userID)";
    if($mysqli->query($joinQuery) === TRUE) {
        $sent = true;
    }
}

}
if ($sent) {
    $message = "Invites succesfully Sent";
    $_SESSION['message'] = $message;
    header("Location: ../systemMessage.php?routed=5&eventID=$eventID");
}
else {
    $message = "Invites were not sent, something went wrong";
    $_SESSION['errorMessage'] = $message;
    header("Location: ../erorr.php?routed=5&eventID=$eventID");
}  
}
else {
    $message = "Invites were not sent, something went wrong";
    $_SESSION['errorMessage'] = $message;
    header("Location: ../erorr.php?routed=5&eventID=$eventID");
}
$mysqli->close();

?>
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
if (isset($_POST['addedFriendID'])) {
    $addedFriendID = $_POST['addedFriendID'];
    $addedFriendID = (int)$addedFriendID;
}
else {
    $addedFriendID = NULL;
    
}

if (($userID != NULL)&&($addedFriendID != NULL)) {
    require './databaseConnection.php';


  if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
    }
    else {
    echo "<script>console.log('Connected successfully...')</script>";
    }

    $query = "INSERT INTO Friendships(friend1userID, friend2userID, relationshipAccepted) VALUES($userID, $addedFriendID, 1)";
    if ($mysqli->query($query) === TRUE) {
        $message = "Friend Request Sent!";
        $_SESSION['message'] = $message;
        header("Location: ../systemMessage.php");
    }
}
else{
    $_SESSION['errorMessage'] = "Something went wrong; we are unable to process your friend request at this time.";
    header("Location: ../error.php");
}



$mysqli->close();
?>
<?php 

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



if(isset($_POST['eventTitle'])) {
    $eventTitle = test_input($_POST['eventTitle']);
  }
else{
    $eventTitle = NULL;
  }
if(isset($_POST['startDate'])) {
    $startDate = test_input($_POST['startDate']);
    $startDate = str_replace("/","-", $startDate);
  }
else{
    $startDate = NULL;
  }
if(isset($_POST['endDate'])) {
    $endDate = test_input($_POST['endDate']);
    $endDate = str_replace("/","-", $endDate);
    
  }
else{
    $endDate = NULL;
  }
if(isset($_POST['startTime'])) {
    $startTime = test_input($_POST['startTime']);
    $startTime = $startTime . ":00";
    
  }
else{
    $startTime = NULL;
  }
if(isset($_POST['endTime'])) {
    $endTime = test_input($_POST['endTime']);
    $endTime = $endTime . ":00";
    
  }
else{
    $endTime = NULL;
  }
if(isset($_POST['description'])) {
    $description = test_input($_POST['description']);
  }
else{
    $description = NULL;
  }
if(isset($_POST['street'])) {
    $street = test_input($_POST['street']);
  }
else{
    $street = NULL;
  }
if(isset($_POST['city'])) {
    $city = test_input($_POST['city']);
  }
else{
    $city = NULL;
  }
if(isset($_POST['state'])) {
    $state = test_input($_POST['state']);
  }
else{
    $state = NULL;
  }
if(isset($_POST['zip'])) {
    $zip = test_input($_POST['zip']);
  }
else{
    $zip = NULL;
  }
  if(isset($_POST['privacy'])) {
    $privacy = test_input($_POST['privacy']);
    if($privacy == 'isPrivate')
    $privacy = 1;
    else
    $privacy = 0;
  }
else{
    $privacy = 0;
  }

  if(isset($_POST['category'])) {
    $genre = test_input($_POST['category']);
    $genre = (int)$genre;
  }
else{
    $genre = NULL;
  }

if (($userID != NULL) && ($eventTitle != NULL) && ($startDate != NULL) && ($startTime != NULL) && ($street != NULL) && ($city != NULL) && ($state != NULL) && ($zip != NULL)){

    // Connect to MySQL and the EventsForAll Database
    $mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll");

    if ($mysqli->connection_error) {
        die("connection Failed: " . $mysqli->connection_error);
        echo "<script>console.log('Connection Error...')</script>";
    }
    else {
        echo "<script>console.log('Connected successfully...')</script>";
    }


    // Query database to create user
    $query = "INSERT INTO Events(userID, eventTitle, startDate, startTime, endDate, endTime, street, city, USstate, zip, eventDescription, genre, privacy) VALUES($userID, '$eventTitle', '$startDate', '$startTime', '$endDate', '$endTime', '$street', '$city', '$state', '$zip', '$description',$genre,$privacy)";
    if ($mysqli->query($query) === TRUE) {
        $message = "Event Successfully Created";
        $_SESSION['message'] = $message;
    }
    else {
        $message = "Event Creation Failed!!!" . $mysqli->error;
        var_dump($userID, $eventTitle, $startDate, $startTime, $endDate, $endTime, $street, $city, $state, $zip, $description, $genre, $privacy);
    }
    $mysqli->close();
    }
    echo "<p>$message</p>";


?>
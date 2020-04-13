<?php
session_start();

require './functions.php';

//read in and set session variables 
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

//read in form input
if(isset($_POST['firstName'])) {
    $firstName = test_input($_POST['firstName']);
  }
  else{
    $firstName = NULL;
  }
if(isset($_POST['lastName'])) {
    $lastName = test_input($_POST['lastName']);
  }
  else{
    $lastName = NULL;
  }
if(isset($_POST['dob'])) {
  $dob = test_input($_POST['dob']);
}
else{
  $dob = NULL;
}
if(isset($_POST['email'])) {
    $email = test_input($_POST['email']);
}
else{
    $email = NULL;
}
if(isset($_POST['phone'])) {
  $phone = test_input($_POST['phone']);
}
else{
  $phone = NULL;
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


if (($userID != NULL) && ($firstName != NULL) && ($lastName != NULL) && ($dob != NULL) && ($email != NULL) && ($phone != NULL) && ($street != NULL) && ($city != NULL) && ($state != NULL) && ($zip != NULL)){

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
$query = "UPDATE Users SET firstName='$firstName', lastName='$lastName', email='$email', dateOfBirth='$dob', street='$street', city='$city', USstate='$state', zip='$zip' WHERE userID=$userID";
if ($mysqli->query($query) === TRUE) {
    $message = "Account Successfully Updated";
    $_SESSION['message'] = $message;
    header("Location: ../systemMessage.php");
}
else {
  $message = "Account Update Failed!!!";
  $_SESSION['errorMessage'] = $message;
  header("Location: ../error.php");
}
$mysqli->close();
}



?>
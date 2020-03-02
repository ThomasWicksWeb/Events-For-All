<?php
session_start();


//set form variables and capture form input

if(isset($_POST['userName'])) {
  $userName = $_POST['userName'];
}
else{
  $userName = NULL;
}
if(isset($_POST['dob'])) {
  $dob = $_POST['dob'];
}
else{
  $dob = NULL;
}
if(isset($_POST['emailInput'])) {
    $emailInput = $_POST['emailInput'];
}
else{
    $emailInput = NULL;
}
if(isset($_POST['confirmEmailInput'])) {
    $confirmEmailInput = $_POST['confirmEmailInput'];
}
  else{
    $confirmEmailInput = NULL;
}
if(isset($_POST['passwordInput'])) {
    $passwordInput = $_POST['passwordInput'];
}
  else{
    $passwordInput = NULL;
}

if (($logonid != NULL) AND ($password != NULL)){
// Connect to MySQL and the EventsForAll Database
$mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll"); 

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}


// Query database for user profile
$query = "INSERT INTO Users(email, userName, userPassword, dateOfBirth) VALUES('$emailInput', '$userName', '$passwordInput', '$dob')";
if ($mysqli->query($query) === TRUE) {
    $message = "Account Successfully Created";
}

$mysqli->close();
}


?>
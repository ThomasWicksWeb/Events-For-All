<?php
session_start();

require './functions.php';

//set form variables and capture form input

if(isset($_POST['userName'])) {
  $userName = test_input($_POST['userName']);
}
else{
  $userName = NULL;
}
if(isset($_POST['dob'])) {
  $dob = test_input($_POST['dob']);
}
else{
  $dob = NULL;
}
if(isset($_POST['emailInput'])) {
    $email = test_input($_POST['emailInput']);
}
else{
    $email = NULL;
}
if(isset($_POST['confirmEmailInput'])) {
    $confirmEmailInput = test_input($_POST['confirmEmailInput']);
}
  else{
    $confirmEmailInput = NULL;
}
if(isset($_POST['passwordInput'])) {
    $passwordInput = test_input($_POST['passwordInput']);
}
  else{
    $passwordInput = NULL;
}
if(isset($_POST['confirmPasswordInput'])) {
  $confirmPasswordInput = test_input($_POST['confirmPasswordInput']);
}
else{
  $confirmPasswordInput = NULL;
}


if (($userName != NULL) && ($passwordInput != NULL) && ($dob != NULL) && ($email != NULL)){

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
$query = "INSERT INTO Users(email, userName, userPassword, dateOfBirth) VALUES('$email', '$userName', '$passwordInput', '$dob')";
if ($mysqli->query($query) === TRUE) {
    $message = "Account Successfully Created";
    $_SESSION['message'] = $message;
}
else {
  $message = "Account Creation Failed!!!";
}
$mysqli->close();
}
echo "<p>$message</p>";

?>
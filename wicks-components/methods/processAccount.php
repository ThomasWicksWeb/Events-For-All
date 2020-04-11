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
if(isset($_POST['confirmEmail'])) {
    $confirmEmailInput = test_input($_POST['confirmEmail']);
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
if(isset($_POST['phone'])) {
  $phone = test_input($_POST['phone']);
}
else{
  $phone = NULL;
}

$target_dir = "./images/" . $userName . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $message1 = "File is an image - " . $check["mime"] . ".";
        echo $message1;
        $uploadOk = 1;
    } else {
        $errorMessage1 = "File is not an image.";
        header("Location: ./errorMessage.php");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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
$query = "INSERT INTO Users(email, userName, userPassword, dateOfBirth, firstName, lastName, street, city, USstate, zip, phone) VALUES('$email', '$userName', '$passwordInput', '$dob', '$firstName', '$lastName', '$street', '$city', '$state', '$zip', '$phone')";
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
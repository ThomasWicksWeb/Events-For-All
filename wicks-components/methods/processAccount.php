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
    $_SESSION['loggedon'] = TRUE;

      $query2 = "SELECT * FROM Users WHERE userName = '$userName'";
      $result = $mysqli->query($query2);
      if ($result->num_rows > 0) {
        // output data of each row
       while($row = $result->fetch_assoc()) {   
            $userName = $row["userName"];
            $userID = $row["userID"];        
       }
      
      $_SESSION['userName'] = $userName;
      $_SESSION['userID'] = $userID;
      $target_dir = "../images/" . $userName . "/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $filename = basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              $message1 = "File is an image - " . $check["mime"] . ".";
              echo "<script>console.log('$message1')</script>";
              $uploadOk = 1;
          } else {
              $errorMessage1 = "File is not an image.";
              $_SESSION["errorMessage"] = $errorMessage1;
              $uploadOk = 0;
              header("Location: ../error.php");
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
          $errorMessage2 = "Sorry, file already exists.";
          $_SESSION["errorMessage"] = $errorMessage2;
          $uploadOk = 0;
          header("Location: ../error.php");
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $errorMessage3 = "Sorry, your file is too large.";
          $_SESSION["errorMessage"] = $errorMessage3;
          $uploadOk = 0;
          header("Location: ../error.php");
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          $errorMessage4 = "Sorry, only JPG, JPEG, PNG files are allowed.";
          $_SESSION["errorMessage"] = $errorMessage4;
          $uploadOk = 0;
          header("Location: ../error.php");
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $errorMessage5 = "Sorry, your file was not uploaded.";
          $_SESSION["errorMessage"] = $errorMessage5;
          $uploadOk = 0;
          header("Location: ../error.php");
      // if everything is ok, try to upload file
      } 
      else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $successMessage = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
              $query2 = "INSERT INTO UserProfile(userID, profileImg) VALUES('$userID','$filename')";
              if ($mysqli->query($query2) === TRUE) {
              $message2 = " and Profile Image Successfully uploaded";
              $_SESSION['message'] = $message . $message2;
              header("Location: ../systemMessage.php");}
          } 
          else {
              $errorMessage6 =  "Sorry, there was an error uploading your file.";
              $_SESSION["errorMessage"] = $errorMessage6;
              header("Location: ../error.php");
          }  
      }
    }
    else {
    $errorMessage7 = "Profile Successfully Created, but Image Upload Failed!!!";
    $_SESSION['message'] = $errorMessage7;
    header("Location: ../systemMessage.php");
    }
  }
}
else {
  $message = "Account Creation Failed!!!";
  $_SESSION["errorMessage"] = $message;
  header("Location: ../error.php");
}

$mysqli->close();



?>
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
  $zip = (int)$zip;
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

/*
var_dump($email);
var_dump($userName);
var_dump($passwordInput);
var_dump($dob);
var_dump($firstName);
var_dump($lastName);
var_dump($street);
var_dump($city);
var_dump($state);
var_dump($zip);
var_dump($phone);
*/

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

     /* var_dump($message, $_SESSION['message'], $_SESSION['loggedon']);*/

      $query2 = "SELECT * FROM Users WHERE userName = '$userName'";
      $result = $mysqli->query($query2);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {   
            $userID = $row["userID"];
        }
        $userID = (int)$userID;
        $_SESSION['userName'] = $userName;
        $_SESSION['userID'] = $userID;
      
      var_dump($userName);
      var_dump($userID);
      mkdir("../images/$userName/");
      $target_dir = "../images/$userName/";
      $file = $_FILES['profileImg'];
      $filename = $_FILES['profileImg']['name'];
      $fileTmpName = $_FILES['profileImg']['tmp_name'];
      $fileSize = $_FILES['profileImg']['size'];
      $fileError = $_FILES['profileImg']['error'];
      $fileType = $_FILES['profileImg']['type'];
      

      $fileExt = explode(".", $filename);
      $fileLowerExt = strtolower(end($fileExt));

      $uploadOk = 1;
  
  
      // Check if file already exists
      if (file_exists($target_file)) {
        $errormessage = "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["file"]["size"] > 500000) {
        $errormessage = "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if(($fileLowerExt != "jpg") && ($fileLowerExt != "png") && ($fileLowerExt != "jpeg")) {
      $errormessage =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        $fileNewName = uniqid('', TRUE).".".$fileLowerExt;
        $target_file = $target_dir . $fileNewName;
        if (move_uploaded_file($fileTmpName, $target_file)) {
          $query3 = "INSERT INTO UserImgs(userID, imageName) VALUES($userID, '$fileNewName')";
          $query4 = "INSERT INTO UserProfile(userID, profileImg) VALUES($userID, '$fileNewName')";
          if (($mysqli->query($query3) === TRUE) && ($mysqli->query($query4) === TRUE)) {
          $message = "Account Successfully Created";
          $_SESSION['message'] = $message;
          //header("Location: ../systemMessage.php");
        }
          $imageUpload = TRUE;
          echo "<script>console.log('$imageUpload')</script>";
          echo "<script>console.log('$target_dir')</script>";
          echo "<script>console.log('$target_file')</script>";
        } 
        else {
            $imageUpload = false;
            $errormessage = "Sorry, there was an error uploading your file.";
            echo "<script>console.log('$imageUpload')</script>";
            echo "<script>console.log('$errormessage')</script>";
            echo "<script>console.log('$target_dir')</script>";
            echo "<script>console.log('$target_file')</script>";   
        }
        }
        
    }
  }
  else {
    $message = "Account Creation Failed!!!";
  $_SESSION["errorMessage"] = $message;
  //header("Location: ../error.php");
  var_dump($message);
  } 
}
else {
  $message = "Account Creation Failed!!!";
  $_SESSION["errorMessage"] = $message;
  //header("Location: ../error.php");
}

$mysqli->close();



?>
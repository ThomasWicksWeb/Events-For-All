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
if (isset($_SESSION['userName'])) {
	$userName = $_SESSION['userName'];
}
else {
	$userName = NULL;
}

//read in form input
if(isset($_POST['description'])) {
    $bio = test_input($_POST['description']);
  }
  else{
    $bio = NULL;
  }
if(isset($_POST['hobbies'])) {
    $hobbies = test_input($_POST['hobbies']);
  }
  else{
    $hobbies = NULL;
  }

  
  $target_dir = "../images/$userName/";
  $file = $_FILES['profileImg'];
  $filename = $_FILES['profileImg']['name'];
  $fileTmpName = $_FILES['profileImg']['tmp_name'];
  $fileSize = $_FILES['profileImg']['size'];
  $fileError = $_FILES['profileImg']['error'];
  $fileType = $_FILES['profileImg']['type'];
  $target_file = $target_dir . $file;

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
          $imageUpload = TRUE;
      } else {
            $imageUpload = false;
            $errormessage = "Sorry, there was an error uploading your file.";   
      }
  }

  if(($bio != NULL) && ($hobbies != NULL)) {
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
$query = "UPDATE UserProfile SET profileImg='$fileNewName', bio='$bio', hobbies='$hobbies' WHERE userID=$userID";
$query2 = "INSERT INTO UserImgs(userID, imageName) VALUES($userID, '$fileNewName')";
if (($mysqli->query($query) === TRUE) && ($mysqli->query($query2) === TRUE)) {
    $message = "Profile Successfully Updated";
    $_SESSION['message'] = $message;
    header("Location: ../systemMessage.php");
}
else {
    $message = "Profile Update Failed!!!";
    if($errormessage){
        $message = "Profile Update Failed!!!" . $errormessage;
    }
  $_SESSION['errorMessage'] = $message;
    header("Location: ../error.php");
}


$mysqli->close();
}




?>
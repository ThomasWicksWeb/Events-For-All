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
    if($privacy == 'isPrivate'){
    $privacy = 1;
    }
    else {
    $privacy = 0;
    }
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

if(isset($_POST['maxGuestsInput'])) {
    $maxGuestsInput = test_input($_POST['maxGuestsInput']);
    $maxGuestsInput = (int)$maxGuestsInput;
  }
else{
    $maxGuestsInput = NULL;
  }

  /*var_dump($userID, $eventTitle, $startDate, $startTime, $endDate, $endTime, $street, $city, $state, $zip, $description, $genre, $privacy, $maxGuestsInput);*/

if (($userID != NULL) && ($eventTitle != NULL) && ($startDate != NULL) && ($startTime != NULL) && ($endDate != NULL) && ($endTime != NULL) && ($street != NULL) && ($city != NULL) && ($state != NULL) && ($zip != NULL) && ($description != NULL)){

    require './databaseConnection.php';

    if ($mysqli->connection_error) {
        die("connection Failed: " . $mysqli->connection_error);
        echo "<script>console.log('Connection Error...')</script>";
    }
    else {
        echo "<script>console.log('Connected successfully...')</script>";
    }   
    

    // Query database to create event
    $query = "INSERT INTO Events(userID, eventTitle, startDate, startTime, endDate, endTime, street, city, USstate, zip, eventDescription, genre, privacy, maxNumAttendees) VALUES($userID, '$eventTitle', '$startDate', '$startTime', '$endDate', '$endTime', '$street', '$city', '$state', '$zip', '$description', '$genre', '$privacy', '$maxGuestsInput')";
    if ($mysqli->query($query) === TRUE) {
        $message = "Event Successfully Created";
        $_SESSION['message'] = $message;
        echo "$message";
        echo "<script>console.log('query1 worked')</script>";
        
        $target_dir = "../images/eventImages/";
        $file = $_FILES['eventImg'];
        $filename = $_FILES['eventImg']['name'];
        $fileTmpName = $_FILES['eventImg']['tmp_name'];
        $fileSize = $_FILES['eventImg']['size'];
        $fileError = $_FILES['eventImg']['error'];
        $fileType = $_FILES['eventImg']['type'];
      

      $fileExt = explode(".", $filename);
      $fileLowerExt = strtolower(end($fileExt));

      $uploadOk = 1;
  
  
      // Check if file already exists
      if (file_exists($target_file)) {
        $errormessage = "Sorry, file already exists.";
        $uploadOk = 0;
        echo "$errormessage";
      }
      // Check file size
      if ($_FILES["file"]["size"] > 500000) {
        $errormessage = "Sorry, your file is too large.";
        $uploadOk = 0;
        echo "$errormessage";
      }
      // Allow certain file formats
      if(($fileLowerExt != "jpg") && ($fileLowerExt != "png") && ($fileLowerExt != "jpeg")) {
      $errormessage =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      echo "$errormessage";
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        $fileNewName = uniqid('', TRUE).".". $fileLowerExt;
        $target_file = $target_dir . $fileNewName;
        if (move_uploaded_file($fileTmpName, $target_file)) {
         // $message = "";
         // $_SESSION['message'] = $message;
         $query2 = "SELECT EventID FROM Events WHERE userID = '$userID' AND WHERE eventTitle = '$eventTitle'";
        $result2 = $mysqli->query($query2);
        echo "$mysqli->error";
        if ($result2->num_rows > 0) {
        // output data of each row
        echo "Second Query Works";
        echo "<script>console.log('query2 worked')</script>";
        while($row = $result2->fetch_assoc()) {   
            $eventID = $row["EventID"];
        }
         $query3 = "INSERT INTO EventImgs(eventID, userID, imageName) VALUES($eventID, '$userID', '$fileNewName')";
          
         if ($mysqli->query($query3) === TRUE) {
          $mysqli->close();
          $imageUpload = TRUE;
          echo "<script>console.log('$imageUpload')</script>";
          echo "<script>console.log('$target_dir')</script>";
          echo "<script>console.log('$target_file')</script>";
         }
        }
        else {
          echo "$mysqli->error";
          echo "<script>console.log('$mysqli->error')</script>";
        }
      }else {
        $mysqli->close();
        echo "Image move Failed";
        echo "<script>console.log('Image move failed')</script>";
      }
      } 


        header("Location: ../systemMessage.php?routed=2");
    }
    else {
        $message = "Event Creation Failed!!!" . $mysqli->error;
        var_dump($userID, $eventTitle, $startDate, $startTime, $endDate, $endTime, $street, $city, $state, $zip, $description, $genre, $privacy, $maxGuestsInput);
        $_SESSION['errorMessage'] = $message;
        header("Location: ../error.php?routed=2");

    }
    $mysqli->close();
    }
    else {
      echo "<script>console.log('failed to get data')</script>";
    }
    


?>
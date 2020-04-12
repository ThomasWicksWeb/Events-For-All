<?php $target_dir = "../images/" . "testingImage" . "/";
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
          $errorMessage4 = "Sorry, only JPG, JPEG, or PNG files are allowed.";
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
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
             $successMessage = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
              $errorMessage6 =  "Sorry, there was an error uploading your file.";
              $_SESSION["errorMessage"] = $errorMessage6;
              header("Location: ../error.php");
          }
      }
      }
      else{
        $profileImg = NULL;
      }
    if ($profileImg !== NULL) {
      $query2 = "INSERT INTO UserProfile(userID, profileImg) VALUES('$userID','$filename')";
      if ($mysqli->query($query2) === TRUE) {
        $message2 = " and Profile Image Successfully uploaded";
        $_SESSION['message'] = $message . $message2;
        header("Location: ../systemMessage.php");}
    }
    ?>
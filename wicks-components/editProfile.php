<?php 

//Start session and check logon status
session_start();
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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Title goes here">
    <meta name="keywords" content="Keywords go here">
    <meta name="description" content="Description goes here">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta property="og:image" content="./images/thumbnail.png" />
    <meta property="og:title" content="Title" />
    <meta property="og:description" content="Description" />

    <title>Edit Profile | Events-4-All</title>

    <link rel="icon" href="./images/heyHand.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- <script src="./vendor/smoothScroll.js"></script> -->

</head>

<body>
    <!-- <Navbar File> -->
    <?php require './navbar.php'; ?>
    <?php

if (($loggedon) && ($userID !== NULL) && ($userName !== NULL)) {
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
    $query = "SELECT * FROM UserProfile WHERE userID = '$userID'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
       while($row = $result->fetch_assoc()) {
            
            $profileImage = $row["profileImg"];
            $bio = $row["bio"];
            $hobbies = $row["hobbies"];
       }
       
      echo " <!-- <EditProfileInformation> -->
    <section class='section'>
        <div class='container'>"; ?>
    <form class='form' method='POST' action='<?php echo htmlspecialchars("./methods/processProfileChanges.php");?>'>
        <?php echo "<h2 class='is-size-2 has-text-weight-bold has-text-centered'>Edit Profile</h2>
                <h2 class='is-size-4 has-text-weight-bold has-text-centered'>General Information</h2>
                
                <div class='dataSet'>
                    <h6 class='has-text-weight-bold is-size-5'>Username</h6>
                    <p class='is-size-6'>$userName</p>
                </div>

                <hr />

                <h2 class='is-size-5 has-text-weight-bold'>Change Profile Picture</h2>

                <div class='file has-name'>
                    <label class='file-label'>
                        <input id='editProfileNewPicture' class='file-input' type='file' name='newProfileImg'>
                        <span class='file-cta'>
                        <span class='file-icon'>
                            <i class='fas fa-upload'></i>
                        </span>
                        <span class='file-label'>Choose a file…</span>
                        </span>
                        <span id='displayFileText' class='file-name'>$profileImage</span>
                    </label>
                </div>

                <hr />
                    
                <div class='field'>
                    <label class='label is-size-5'>Bio</label>
                    <div class='control has-icons-left'>
                        <textarea id='EditBio' name='description' value='$bio' required class='textarea'>$bio</textarea>
                    </div>
                </div>

                <hr />

                <div class='field'>
                    <label class='label is-size-5'>Hobbies <span class='has-text-grey has-text-weight-normal'>(Please
                            put a comma between each hobby)</span></label>
                    <div class='control has-icons-left'>
                        <textarea id='EditHobbies' name='hobbies' value='$hobbies' required
                            class='textarea'>$hobbies</textarea>
                    </div>
                </div>

                <div class='field is-grouped'>
                    <div class='control'>
                        <button value='submit' type='submit' class='button is-info has-text-weight-bold'>Submit
                            Changes</button>
                    </div>
                    <div class='control'>
                        <button class='button is-danger is-light has-text-weight-bold'>Cancel</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- </EditProfileInformation> -->";
    }
       else {
        $errorMessage = "Something went wrong, please try again later...";
        $_SESSION['errorMessage'] = $errorMessage;
        header('Location: ./errorMessage.php');
    }   
    
   
   
   }
   ?>

        <script src="./js/scripts.js"></script>
        <script>
            const profilePictureInput = $("#editProfileNewPicture");
            const displayFileText = $("#displayFileText");

            function getFileData(myFile) {
                const file = myFile.files[0];
                const filename = file.name;
                // document.getElementById('displayFileText').val = filename;
                displayFileText.text(filename);
            }
        </script>
</body>

</html>
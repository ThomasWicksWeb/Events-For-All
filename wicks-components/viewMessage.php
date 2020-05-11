<?php 
ob_start();
//Start session and check logon status
session_start();

require './methods/functions.php';

if (isset($_SESSION['loggedon'])) {
	$loggedon = $_SESSION['loggedon'];
}
else {
    $loggedon = FALSE;
    //header("Location: ./methods/logOut.php");
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

if (isset($_GET['message'])) {
    $messageID = $_GET['message'];
}
else {
	$messageID = NULL;
}

 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Title goes here">
    <meta name="keywords"
        content="Keywords go here">
    <meta name="description"
        content="Description goes here">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta property="og:image" content="./images/thumbnail.png" />
    <meta property="og:title" content="Title" />
    <meta property="og:description"
        content="Description" />

    <title>Message | Events-4-All</title>

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
    <?php require './navbar.php'; 
    require './methods/databaseConnection.php';

    if ($mysqli->connection_error) {
        die("connection Failed: " . $mysqli->connection_error);
        echo "<script>console.log('Connection Error...')</script>";
    }
    else {
        echo "<script>console.log('Connected successfully...')</script>";
    }

    if (($loggedon) && ($userID != NULL) && ($messageID != NULL)){

        // Query database for message data
        $messageQuery = "SELECT * FROM Messages WHERE messageID = '$messageID'";
        $messageResult = $mysqli->query($messageQuery);
        if ($messageResult->num_rows > 0) {
        // grab data of each field
        while($row2 = $messageResult->fetch_assoc()) {
           $messageID = $row2["messageID"]; 
           $senderID = $row2["userID"];
           $subject = $row2["subject"];
           $messageBody = $row2["messageBody"];
           $sendDateMes = $row2["sentDateTime"];
           $read = $row2["beenRead"];

           if (($loggedon) && ($userID != NULL) && ($messageID != NULL) && ($senderID != NULL) && ($subject != NULL) && ($messageBody != NULL) && ($sendDateMes != NULL) && ($read != NULL)) {
            $messageObj = new Message($messageID, $senderID, $userID, $subject, $messageBody, $sendDateMes, $read);
             }
             $date = $messageObj->getSendDate();
             $time = $messageObj->getSendTime();

           $query2 = "SELECT Users.userName, UserProfile.profileImg FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$senderID' AND UserProfile.userID = '$senderID'";
           $result2 = $mysqli->query($query2);
           if ($result2->num_rows > 0) {
           // output data of each row
               while($row3 = $result2->fetch_assoc()) {
                   $senderUserName = $row3["userName"]; 
                   $senderUserImg = $row3["profileImg"];
               }
           }

           if($read == 0) {
            $updateReadQuery = "UPDATE Messages SET beenRead = 1 WHERE messageID = $messageID";
            $mysqli->query($updateReadQuery); 
           }

        }
        
        }
        
        }

        var_dump($messageID, $senderID, $subject, $messageBody, $sendDateMes, $read);

    ?>

    <section class="section">
        <div class="container">
            <h1 class="has-text-weight-bold is-size-3">Chat with {{ person you're chatting with's name }}</h1>

            <!-- Duplicate this line each time you receive a message -->
            <div class="messages box">
                <h2 class="is-size-5"><span class="has-text-weight-bold">{{ Person msg is from }} </span><span class="is-size-6 has-text-light-grey">- {{ Date }}</span></h2>
                <p>{{ Message Body }}</p>
            </div>
            <!-- Duplicate when you send a message -->
            <div class="messages box">
                <h2 class="is-size-5"><span class="has-text-weight-bold">{{ Your username }} </span><span class="is-size-6 has-text-light-grey">- {{ Date }}</span></h2>
                <p>{{ Message Body }}</p>
            </div>


        </div>
    </section>
  
    
<!-- 
    <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script src="./js/scripts.js"></script>
</body>

</html>
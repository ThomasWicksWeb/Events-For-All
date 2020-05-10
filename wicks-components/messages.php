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

require './methods/databaseConnection.php'; 

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}

if (($loggedon) && ($userID != NULL)){
  

    // Query database to create user
    $inviteQuery = "SELECT * FROM Invitees WHERE userID = '$userID'";
    $inviteResult = $mysqli->query($inviteQuery);
    if ($inviteResult->num_rows > 0) {
     $i = 0;
     $inviteList = array();
    // output data of each row
    while($row = $inviteResult->fetch_assoc()) {
       $inviteID = $row["inviteeID"]; 
       $eventID = $row["eventID"];
       $sendDate = $row["sendDateTime"];
       $choice = $row["inviteeChoice"];
       if (($loggedon) && ($userID != NULL) && ($inviteID != NULL) && ($eventID != NULL) && ($sendDate != NULL) && ($choice != NULL)) {
       $inviteList[$i] = new Invite($inviteID, $eventID, $userID, $sendDate, $choice);
        }
       else {
       $inviteList[$i] = NULL;
       }
       $i++;
    }
    foreach($inviteList as $invite) {
        echo($invite->getEventID() . "  " . $invite->getSendDate() . "  " . $invite->getSendTime() . "<br>");
        
    }
    }
    
    }

    if (($loggedon) && ($userID != NULL)){
  

        // Query database to create user
        $messageQuery = "SELECT * FROM Messages WHERE recipientUserID = '$userID'";
        $messageResult = $mysqli->query($messageQuery);
        if ($messageResult->num_rows > 0) {
         $i = 0;
         $messageList = array();
        // output data of each row
        while($row2 = $messageResult->fetch_assoc()) {
           $messageID = $row2["messageID"]; 
           $senderID = $row2["userID"];
           $subject = $row2["subject"];
           $messageBody = $row2["messageBody"];
           $sendDateMes = $row2["sentDateTime"];
           $read = $row2["beenRead"];
           if (($loggedon) && ($userID != NULL) && ($messageID != NULL) && ($senderID != NULL) && ($subject != NULL) && ($messageBody != NULL) && ($sendDateMes != NULL) && ($read != NULL)) {
           $messageList[$i] = new Message($messageID, $senderID, $userID, $subject, $messageBody, $sendDateMes, $read);
            }
           else {
           $messageList[$i] = NULL;
           }
           $i++;
        }
        
        }
        
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

    <title>Messages | Events-4-All</title>

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


    <section class="section">
        <div class="container">
            <h1 class="has-text-centered has-text-weight-bold is-size-3">Messages</h1>
            <ul class="all-messages">
            <?php

        if($messageList)
        require './methods/databaseConnection.php'; 

            // Message display
        foreach($messageList as $message) {
            if($message != NULL){
                
                $messageID = $message->getMessageID();
                $subject = $message->getSubject();
                $messageBody = $message->getMessageBody();
                $messageBody = substr($messageBody, 0, 50) . " ...";
                $friendID = $message->getSentByID();
                $date = $message->getSendDate();
                $time = $message->getSendTime();
                

                $query2 = "SELECT Users.userName, UserProfile.profileImg FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$friendID' AND UserProfile.userID = '$friendID'";
                    $result2 = $mysqli->query($query2);
                    if ($result2->num_rows > 0) {
                    // output data of each row
                        while($row3 = $result2->fetch_assoc()) {
                            $friendUserName = $row3["userName"]; 
                            $friendUserImg = $row3["profileImg"];
                        }
                    }



               echo "<li>
                <a href='./viewMessage.php?message=$messageID'>
                    <div>";
                    if($friendUserImg != NULL)
                           echo "<img src='./images/$friendUserName/$friendUserImg' alt='Profile Photo' />";
                           else
                           echo "<img src='./images/ProfilePhotoWithLogo.png' alt='Profile Photo' />";
                           echo"
                        <img src='https://placekitten.com/50/50' alt=''>
                        <h3 class='is-size-3 has-text-weight-bold'>$friendUserName</h3>
                    </div>
                    <p class='is-size-5'>$subject</p>
                    <p class='is-size-6'>$messageBody</p>
                    <p class='has-text-grey-light'>Sent: $date At: $time</p>
                </a>
            </li>";
            

            }
            
        }
// end Message display?>

                <li>
                    <a href="#">
                        <div>
                            <img src="https://placekitten.com/50/50" alt="">
                            <h3 class="is-size-3 has-text-weight-bold">{{ Username }}</h3>
                        </div>
                        <p class="is-size-6">Message preview. Cut after like 15 words?</p>
                        <p class="has-text-grey-light">Last sent: {{ (DD/MM) }}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="https://placekitten.com/50/50" alt="">
                            <h3 class="is-size-3 has-text-weight-bold">{{ Username }}</h3>
                        </div>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illum, pariatur qui dolore accusamus ullam...</p>
                        <p class="has-text-grey-light">Last sent: {{ (DD/MM) }}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="https://placekitten.com/50/50" alt="">
                            <h3 class="is-size-3 has-text-weight-bold">{{ Username }}</h3>
                        </div>
                        <p class="is-size-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, ex illo! Repellat, fuga! Voluptatibus, ab minus.</p>
                        <p class="has-text-grey-light">Last sent: {{ (DD/MM) }}</p>
                    </a>
                </li>
            </ul>
        </div>
    </section>



    <!-- <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script src="./js/scripts.js"></script>
</body>

</html>
<?php $mysqli->close(); ?>
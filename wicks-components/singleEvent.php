<?php 

//Start session and check logon status
session_start();
require './methods/functions.php';

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

if (isset($_GET['viewEventID'])) {
    $eventID = $_GET['viewEventID'];
}
else {
	$$eventID = NULL;
}

// Connect to MySQL and the EventsForAll Database
require './methods/databaseConnection.php';

// query event data
$eventQuery = "SELECT * FROM Events WHERE EventID = '$eventID'";
$eventResult = $mysqli->query($eventQuery);
if ($eventResult->num_rows > 0) {
    while($row = $eventResult->fetch_assoc()){
        $eventOwnerID = $row['userID'];
        $title = $row['eventTitle'];
        $startDate = parseDate($row['startDate']);
        $startTime = parseTime($row['startTime']);
        $endDate = parseDate($row['endDate']);
        $endTime = parseTime($row['endTime']);
        $street = $row['street'];
        $city = $row['city'];
        $state = $row['USstate'];
        $description = $row['eventDescription'];
        $genre = parseGenre($row['genre']);
        $privacy = $row['privacy'];
        $maxNumAttendees = $row['maxNumAtt'];
        $eventStatus = $row['eventStatus'];
    }

    // query event owner data
        $userQuery = "SELECT Users.userName, UserProfile.profileImg FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$eventOwnerID' AND UserProfile.userID = '$eventOwnerID'";
        $userResult = $mysqli->query($userQuery);
        if ($userResult->num_rows > 0){
        while($row2 = $userResult->fetch_assoc()) {
            $eventOwnerName = $row2['userName'];
            $eventOwnerImg = $row2['profileImg'];
            }
        }


    // query event image
    $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
    $imageResult = $mysqli->query($imageQuery);
    list($eventImage) = mysqli_fetch_row($imageResult);

    
}
else {
    $errorMessage = "Something went wrong finding your event!";
    $_SESSION['errorMessage'] = $errorMessage;
}

$attending = false;

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

    <title>Event | Events-4-All</title>

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



    <!-- <SingleEventPageBody> -->
    <section class="section">
        <div class="container singleEventBodyGridParent">
            <!-- NEED TO LOAD THE BACKGROUND-IMAGE HERE IN HTML -->
            <div class="singleEventBodyGridSplashImg"
                style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
            <div class="singleEventBodyGridActionsBar">
                <ul class="eventPageActionBar">
                    <?php 
                require './methods/databaseConnection.php';
                $attendeeIDQuery = "SELECT userID FROM Attendees WHERE eventID = '$eventID'";
                $attendeeIDResult = $mysqli->query($attendeeIDQuery);
                if ($attendeeIDResult->num_rows > 0){
                    while ($attendeeRow = $attendeeIDResult->fetch_assoc()) {
                        if ($userID == $attendeeRow['userID']){
                        $attending = true;
                        }
                    }
                }
                else{
                    $attending = false;
                }


                
                   
                if (($loggedon) && ($userID != NULL) && ($userName != NULL)) {
                    echo "<li><a class='is-size-6 button is-info' href='#'>Join Event</a></li>
                    <li><a class='is-size-6 button is-secondary' href='#'>Message Organizers</a></li>
                    <li><a class='is-size-6 button is-secondary' href='./attendees.php?eventID=$eventID'>View Antendees</a></li>
                    <li><a class='is-size-6 button is-secondary' id='InviteFriendsBtn' href='#'>Invite All Friends</a></li>";
                    } ?>
                    <li><a class="is-size-6 button is-secondary" href="#">Report Event</a></li>
                </ul>
            </div>
            <div class="singleEventBodyGridProfileImgAndEventInfo">
                <?php
                if ($eventImage != NULL) {
                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image'>";
                }
                else {
                    echo "<img src='./images/DefaultEventImage.jpg' alt='Default Event Image'>";
                }
                ?>
                <p class="has-text-weight-bold is-size-4">Location</p>
                <ul>
                    <?php
            
            if (($loggedon) && ($userID != NULL) && ($userName != NULL) && ($attending)) {
                echo "<li class='has-text-weight-semi-bold is-size-5'>Street: <span class='has-text-weight-normal is-size-6'>$street</span></li>
                <li class='has-text-weight-semi-bold is-size-5'>Town: <span class='has-text-weight-normal is-size-6'>$city</span></li>
                    <li class='has-text-weight-semi-bold is-size-5'>State: <span class='has-text-weight-normal is-size-6'>$state</span></li>";
            }
            else if (($loggedon) && ($userID != NULL) && ($userName != NULL) && ($privacy == 0)) {
                echo "<li class='has-text-weight-semi-bold is-size-5'>Town: <span class='has-text-weight-normal is-size-6'>$city</span></li>
                    <li class='has-text-weight-semi-bold is-size-5'>State: <span class='has-text-weight-normal is-size-6'>$state</span></li>";
            }
            else if (($loggedon) && ($userID != NULL) && ($userName != NULL) && ($privacy == 1)) {
                echo "<li class='has-text-weight-semi-bold is-size-5'><span class='has-text-weight-normal is-size-6'>This event is private!</span></li>
                <li class='has-text-weight-semi-bold is-size-5'>Town: <span class='has-text-weight-normal is-size-6'>$city</span></li>
                    <li class='has-text-weight-semi-bold is-size-5'>State: <span class='has-text-weight-normal is-size-6'>$state</span></li>";
            }
            else {
                echo "<li class='has-text-weight-semi-bold is-size-5'><span class='has-text-weight-normal is-size-6'>Create an account to see location information</span></li>";
            }

            ?>
                </ul>

                <p class="has-text-weight-bold is-size-4">Event Dates</p>
                <ul>
                    <?php 
                    echo "<li class='has-text-weight-semi-bold is-size-5'>Start date: <span class='has-text-weight-normal is-size-6'>$startDate</span></li>
                    <li class='has-text-weight-semi-bold is-size-5'>End date: <span class='has-text-weight-normal is-size-6'>$endDate</span></li>"; ?>
                </ul>

                <p class="has-text-weight-bold is-size-4">Times:</p>
                <ul>
                    <?php 
                echo "<li class='has-text-weight-semi-bold is-size-5'>Starts at: <span class='has-text-weight-normal    is-size-6'>$startTime</span></li>
                    <li class='has-text-weight-semi-bold is-size-5'>Ends at: <span class='has-text-weight-normal is-size-6'>$endTime</span></li>"; ?>
                </ul>
            </div>
            <div class="singleEventBodyGridEventDesc">
                <?php echo " 
                <h1 class='is-size-3'>$title</h1>
                <p class='is-size-6'>$description</p>";
                ?>
            </div>
            <div class="singleEventBodyGridAtendees">
                <h2 class="is-size-4 has-text-weight-semi-bold">Event Organizer</h2>
                <ul>
                    <li class="antendeesListItem">
                        <?php 

                        if ($eventOwnerImg != NULL) {
                            echo "<img src='./images/$eventOwnerName/$eventOwnerImg' alt='Event Image'>";
                        }
                        else {
                            echo "<img src='./images/ProfilePhotoWithLogo.png' alt='Default Event Image'>";
                        }
                        echo "
                        <h4 class='is-size-5'>$eventOwnerName</h4>
                        <h5 class='is-size-6'>Event Founder</h5>
                        <a class='is-size-7' href='./viewProfile.php?viewUser=$eventOwnerID'>View Profile</a>"; ?>
                    </li>

                </ul>

                <h2 class="is-size-4 has-text-weight-semi-bold">Attendees</h2>
                <ul>
                    <?php
                    //require './methods/databaseConnection.php';
                    if (($loggedon) && ($userID != NULL) && ($userName != NULL)) {
                        // query attendees
                        $attendeeQuery = "SELECT * FROM Attendees WHERE eventID = '$eventID'";
                        $attendeeResult = $mysqli->query($attendeeQuery);
                        if ($attendeeResult->num_rows > 0) {
                            while ($row3 = $attendeeResult->fetch_assoc()) {
                            echo "<li class='antendeesListItem'>";
                            $eventAttendeeID = $row3['userID'];
                            
                            $attendeeProfileQuery = "SELECT Users.userName, UserProfile.profileImg FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$eventAttendeeID' AND UserProfile.userID = '$eventAttendeeID' LIMIT 6";
                            $attendeeProfileResult = $mysqli->query($attendeeProfileQuery);
                            if ($attendeeProfileResult->num_rows > 0){
                                while($row4 = $attendeeProfileResult->fetch_assoc()) {
                                $eventAttendeeName = $row4['userName'];
                                $eventAttendeeImg = $row4['profileImg'];
                                }
                            }
                            if ($eventAttendeeImg != NULL) {
                            echo "<img src='./images/$eventAttendeeName/$eventAttendeeImg' alt='Event Image'>";
                            }
                            else {
                                echo "<img src='./images/ProfilePhotoWithLogo.png' alt='Default Event Image'>";
                            }
                            echo "
                            <h4 class='is-size-5'>$eventAttendeeName</h4>
                            <h5 class='is-size-6'>Attendee</h5>
                            <a class='is-size-7' href='./viewProfile.php?viewUser=$eventAttendeeID'>View Profile</a>
                            </li>
                            <a class='has-text-centered viewAllAttendeesLink' href='./attendees.php?eventID=$eventID'>View all attendees</a>";
                        }
                    }
                    else {
                        echo "<h4 class='is-size-5'>No Attendees Regitered Yet</h4>";
                    }
                }
                else {
                    echo "<h4 class='is-size-5'>Create an account to view attendees</h4>";
                }

                ?>

                </ul>
            </div>
        </div>
    </section>
    <!-- </SingleEventPageBody> -->

    <div id="modal" class="modal ">
        <div class="modal-background"></div>
        <div class="modal-content">
            <h5 class="is-size-4 has-text-weight-bold">Invite Friends</h5>
            <p class="is-size-6">Are you sure you want to invite your entire friends list?</p>
            <form action="<?php echo htmlspecialchars("./methods/inviteAllFriends.php");?>" method="POST">
                <div class="modal-button-cont">
                    <button id="sendInvites" class="button is-info">Invite All Friends</button>
                    <button id="cancelInvites" class="button is-danger">Cancel</button>
                </div>
            </form>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>





    <?php 
    $mysqli->close();
    ?>

    <!-- <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script>
        const modalParent = $("#modal")
        const InviteFriendsBtn = $("#InviteFriendsBtn");
        const modalGreySpace = $(".modal-background");
        const modalClose = $(".modal-close");
        const modalCancel = $("#cancelInvites");
        const sendInvites = $("#sendInvites");

        const ToggleIsActive = () => {
            document.querySelectorAll('#modal').forEach(e => e.classList.toggle('is-active'));
        }

        InviteFriendsBtn.on("click", function (e) {
            e.preventDefault();
            ToggleIsActive();
        });

        modalGreySpace.on("click", function (e) {
            e.preventDefault();
            ToggleIsActive();
        });

        modalClose.on("click", function (e) {
            e.preventDefault();
            ToggleIsActive();
        });

        modalCancel.on("click", function (e) {
            e.preventDefault();
            ToggleIsActive();
        });

        sendInvites.on("click", function (e) {
            e.preventDefault();
            alert("Invites Sent!");
            ToggleIsActive();
        });
    </script>

    <script src="./js/scripts.js"></script>
    <script src="./js/singleEvent.js"></script>
</body>

</html>
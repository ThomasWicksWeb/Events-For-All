<?php 

//Start session and check logon status
session_start();
if (isset($_SESSION['loggedon'])) {
	$loggedon = $_SESSION['loggedon'];
}
else {
	$loggedon = FALSE;
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


    <main class="section">
        <div class="container">

            <h1 class="is-size-2 has-text-weight-bold has-text-centered">My Events</h1>

            <?php

            require './methods/functions.php';
            require './methods/databaseConnection.php';
            

            if ($loggedon) {
                        
                        echo "
                <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Hosting</h2>
                <ul class='ViewAllEventsGridParent'>";
                $nearQuery = "SELECT * FROM Events WHERE userID = $userID ORDER BY EventID DESC LIMIT 5";
                $result12 = $mysqli->query($nearQuery);
            if ($result12->num_rows > 0) {
                // output data of each row
                while($row = $result12->fetch_assoc()){
                    $eventID = $row['EventID'];
                    $eventTitle = $row['eventTitle'];
                    $eventDescription = $row['eventDescription'];
                    $eventDescription = substr($eventDescription, 0, 200) . " ...";
                    $startDate = $row['startDate'];
                    $startTime = parseTime($row['startTime']);
                    $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                    $imageResult = $mysqli->query($imageQuery);
                    list($eventImage) = mysqli_fetch_row($imageResult);
                    $currentDate = getdate();
                    $currentDateStr = "$currentDate[year]-$currentDate[mon]-$currentDate[mday]";
                    $currentDateStr = date_create("$currentDateStr", timezone_open("America/New_York"));
                    $startDateCheck = date_create("$startDate", timezone_open("America/New_York"));
                    $startDate = parseDate($startDate);
                    if ($startDateCheck >= $currentDateStr) {
                    echo "<li class='box'>";
                    if ($eventImage === NULL) {
                        echo "<img src='./images/DefaultEventImage.jpg' alt='Event Image' />";
                    }
                    else{
                        echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                    }
                    echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                        <p class='is-size-6 EventDateText has-text-grey'>Event Starts: $startDate $startTime</p>
                        <p class='is-size-6'>$eventDescription
                        </p>
                        <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                    </li>";
                    $displayed = TRUE;
                    }
                }
                if ($displayed == TRUE) {
                    echo "<div class='box'>
                                <div class='link-box'>
                                    <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                                    <a href='./events.php?filter=15' class='is-size-5 view-more-text'>View more events 
                                    <i class='fas fa-arrow-right view-more-arrow'></i></a>
                                </div>
                            </div>
                        </ul>";
                }
                if ($displayed != TRUE) {
                    echo "
                <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You are not currently hosting any events...</h3>";
                }
            }
            else {
                echo "
                <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You are not currently hosting any events...</h3>";
            }
            echo "</ul>"; 
                    }
                

                    if ($loggedon) {
                                
                        $attendingQuery = "SELECT eventID FROM Attendees WHERE userID = '$userID' ORDER BY eventID DESC LIMIT 5";
                        $attendingResult = $mysqli->query($attendingQuery);
                        if ($attendingResult->num_rows > 0){
                            while($attendingRow = $attendingResult->fetch_assoc()) {
                               $eventID = $attendingRow['eventID'];
                                
                        $nearQuery = "SELECT * FROM Events WHERE EventID = $eventID ORDER BY EventID DESC";
                        $result12 = $mysqli->query($nearQuery);
                    if ($result12->num_rows > 0) {
                        // output data of each row
                        while($row = $result12->fetch_assoc()){
                            $eventID = $row['EventID'];
                            $eventTitle = $row['eventTitle'];
                            $eventDescription = $row['eventDescription'];
                            $eventDescription = substr($eventDescription, 0, 200) . " ...";
                            $startDate = $row['startDate'];
                            $startTime = parseTime($row['startTime']);
                            $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                            $imageResult = $mysqli->query($imageQuery);
                            list($eventImage) = mysqli_fetch_row($imageResult);
                            $currentDate = getdate();
                            $currentDateStr = "$currentDate[year]-$currentDate[mon]-$currentDate[mday]";
                            $currentDateStr = date_create("$currentDateStr", timezone_open("America/New_York"));
                            $startDateCheck = date_create("$startDate", timezone_open("America/New_York"));
                            $startDate = parseDate($startDate);
                            if ($startDateCheck >= $currentDateStr) {
                                echo "
                            <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Attending</h2>
                            <ul class='ViewAllEventsGridParent'>";
                            echo "<li class='box'>";
                            if ($eventImage === NULL) {
                                echo "<img src='./images/DefaultEventImage.jpg' alt='Event Image' />";
                            }
                            else{
                                echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                            }
                            echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                <p class='is-size-6 EventDateText has-text-grey'>Event Starts: $startDate $startTime</p>
                                <p class='is-size-6'>$eventDescription
                                </p>
                                <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                            </li>";
                            $displayed = TRUE;
                            if ($displayed == TRUE) {
                                echo "<div class='box'>
                                            <div class='link-box'>
                                                <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                                                <a href='./events.php?filter=14' class='is-size-5 view-more-text'>View more events 
                                                <i class='fas fa-arrow-right view-more-arrow'></i></a>
                                            </div>
                                        </div>
                                    </ul>";
                            }
                            if ($displayed != TRUE) {
                                echo "
                            <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You are not currently registered for any events...</h3>";
                            }
                        }
                        
                    }
                    
                }
                
                else {
                    echo "
                    <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You are not currently registered any events...</h3>";
                }
                echo "</ul>"; 
                        }
                    }
                }
            

                if ($loggedon) {
                    echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Attended</h2>
                           <ul class='ViewAllEventsGridParent'>";
                    $attendingQuery = "SELECT eventID FROM Attendees WHERE userID = '$userID' ORDER BY eventID DESC LIMIT 5";
                    $attendingResult = $mysqli->query($attendingQuery);
                    if ($attendingResult->num_rows > 0){
                        while($attendingRow = $attendingResult->fetch_assoc()) {
                           $eventID = $attendingRow['eventID'];
                           
                    $nearQuery = "SELECT * FROM Events WHERE EventID = $eventID ORDER BY EventID DESC";
                    $result12 = $mysqli->query($nearQuery);

                if ($result12->num_rows > 0) {
                    
                    // output data of each row
                    while($row = $result12->fetch_assoc()){
                        $eventID = $row['EventID'];
                        $eventTitle = $row['eventTitle'];
                        $eventDescription = $row['eventDescription'];
                        $eventDescription = substr($eventDescription, 0, 200) . " ...";
                        $startDate = $row['startDate'];
                        $startTime = parseTime($row['startTime']);
                        $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                        $imageResult = $mysqli->query($imageQuery);
                        list($eventImage) = mysqli_fetch_row($imageResult);
                        $currentDate = getdate();
                        $currentDateStr = "$currentDate[year]-$currentDate[mon]-$currentDate[mday]";
                        $currentDateStr = date_create("$currentDateStr", timezone_open("America/New_York"));
                        $startDateCheck = date_create("$startDate", timezone_open("America/New_York"));
                        $startDate = parseDate($startDate);
                        
                        if ($startDateCheck < $currentDateStr) {
                        echo "<li class='box'>";
                        if ($eventImage === NULL) {
                            echo "<img src='./images/DefaultEventImage.jpg' alt='Event Image' />";
                        }
                        else{
                            echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                        }
                        echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                            <p class='is-size-6 EventDateText has-text-grey'>Event Starts: $startDate $startTime</p>
                            <p class='is-size-6'>$eventDescription
                            </p>
                            <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                        </li>";
                       $displayed = TRUE;
                       
                        }
                        if ($displayed == TRUE) {
                        echo "<div class='box'>
                                    <div class='link-box'>
                                        <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                                        <a href='./events.php?filter=16' class='is-size-5 view-more-text'>View more events 
                                        <i class='fas fa-arrow-right view-more-arrow'></i></a>
                                    </div>
                                </div>
                            </ul>";
                    }
                    if ($displayed != TRUE) {
                        echo "
                    <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You are not currently registered for any events...</h3>";
                    }
                    }
                    
                          
                }
                
                else {
                    echo "
                    <h3 class='is-size-4 has-text-weight-bold allEventsCategoryHeader'>You havent attended any events yet...</h3>";
                }
                echo "</ul>"; 
                        }
                    }

                    }
                    




            ?>

        </div>
    </main>





    <script>

    </script>

    <script src="./js/scripts.js"></script>
</body>

</html>
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

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}
else {
	$filter = NULL;
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

    <title>Events | Events-4-All</title>

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



    <!-- <ViewAllEvents> -->
    <section class="section">
        <div class="container ViewAllEventsContainer">
            <h1 class="is-size-2 has-text-weight-bold has-text-centered">Browse Events</h1>
<?php if($loggedon) {
    echo "<a href='./createEvent.php' class='button is-info EventsPageCreateEventBtn'>Create New Event</a>";
}
?>            

            <div class="field">
                <div class="eventSearch">
                    <label class="label is-size-3 has-text-weight-bold">Search Events</label>
                    <div class="control eventsSearchWithButton">
                        <form action="">
                            <input id="EventsSearchInput" class="input" type="text" name="eventSearch" placeholder="Search">
                            <button id="EventsSearchButton" class="button is-info">Search</button>
                        </form>
                    </div>
                    
                </div>
            </div>

            <div class="box">
                <a id="showFiltersToggle" href="https://www.google.com" class="">
                    <h2 class="has-text-weight-bold is-size-4 filtersText">Filters</h2>
                    <i id="EventsPageFilterArrow" class="fas fa-arrow-down"></i>
                </a>


                <div class="filters-panel-parents">
                    <div class="nav filtersList content">
                        <h2 class="has-text-weight-bold is-size-4">My Events</h2>
                        <ul>
                            <li>
                                <a id="filterMyEvents" class="link">My Events</a>
                            </li>
                            <li>
                                <a id="filterMyAttending" class="link">Attending</a>
                            </li>
                            <li>
                                <a id="filterMyAttended" class="link">Attended</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav filtersList content">
                        <h2 class="has-text-weight-bold is-size-4">All Events</h2>
                        <ul>
                            <li>
                                <a id="filterViewAll" class="link" href="./events.php?view=all">View All</a>
                            </li>
                            <li>
                                <a id="filterArtsAndCrafts" class="link" href="./events.php?filter=0">Arts &amp; Crafts</a>
                            </li>
                            <li>
                                <a id="filterSportsAndFitness" class="link" href="./events.php?filter=7">Sports &amp; Fitness</a>
                            </li>
                            <li>
                                <a id="filterTech" class="link" href="./events.php?filter=8">Technology</a>
                            </li>
                            <li>
                                <a id="filterFoodAndDrinks" class="link" href="./events.php?filter=1">Food &amp; Drinks</a>
                            </li>
                            <li>
                                <a id="filterOutdoorsAndAdventure" class="link" href="./events.php?filter=4">Outdors &amp; Adventure</a>
                            </li>
                            <li>
                                <a id="filterPhotography" class="link" href="./events.php?filter=6">Photography</a>
                            </li>
                            <li>
                                <a id="filterMusic" class="link" href="./events.php?filter=3">Music</a>
                            </li>
                            <li>
                                <a id="filterMovies" class="link" href="./events.php?filter=2">Movies</a>
                            </li>
                            <li>
                                <a id="filterOther" class="link" href="./events.php?filter=9">Other</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav filtersList content">
                        <h2 class="has-text-weight-bold is-size-4">Local</h2>
                        <ul>
                            <li>
                                <a id="filterNearMe" class="link" href="#">Near Me</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav filtersList content">
                        <h2 class="has-text-weight-bold is-size-4">My Date</h2>
                        <ul>
                            <li>
                                <a id="filterComingUp" class="link" href="#">Coming Up</a>
                            </li>
                            <li>
                                <a id="filterRecentlyAdded" class="link">Recently Added</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            
            <?php
                // Connect to MySQL and the EventsForAll Database
                require './methods/databaseConnection.php';

                if ($mysqli->connection_error) {
                    die("connection Failed: " . $mysqli->connection_error);
                    echo "<script>console.log('Connection Error...')</script>";
                }
                else {
                    echo "<script>console.log('Connected successfully...')</script>";
                }

                if($filter == NULL){
                    echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Arts &amp; Crafts</h2>
                            <ul class='ViewAllEventsGridParent'>";
                    
                    $viewArtsNCraftsQuery = "SELECT * FROM Events WHERE genre = 0 ORDER BY startDate DESC LIMIT 5";
                    $result = $mysqli->query($viewArtsNCraftsQuery);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=0' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Sports &amp; Fitness</h2>
                        <ul class='ViewAllEventsGridParent'>";
                        $viewSportsNFitnessQuery = "SELECT * FROM Events WHERE genre = 7 ORDER BY startDate DESC LIMIT 5";
                        $result2 = $mysqli->query($viewSportsNFitnessQuery);
                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while($row = $result2->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                        echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=7' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Technology</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewTechQuery = "SELECT * FROM Events WHERE genre = 8 ORDER BY startDate DESC LIMIT 5";
                    $result3 = $mysqli->query($viewTechQuery);
                        if ($result3->num_rows > 0) {
                            // output data of each row
                            while($row = $result3->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=8' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Food &amp; Drinks</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewFoodQuery = "SELECT * FROM Events WHERE genre = 1 ORDER BY startDate DESC LIMIT 5";
                    $result4 = $mysqli->query($viewFoodQuery);
                        if ($result4->num_rows > 0) {
                            // output data of each row
                            while($row = $result4->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=1' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Outdoors &amp; Adventure</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewOutdoorsQuery = "SELECT * FROM Events WHERE genre = 4 ORDER BY startDate DESC LIMIT 5";
                    $result5 = $mysqli->query($viewOutdoorsQuery);
                        if ($result5->num_rows > 0) {
                            // output data of each row
                            while($row = $result5->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=4' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Photography</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewPhotoQuery = "SELECT * FROM Events WHERE genre = 6 ORDER BY startDate DESC LIMIT 5";
                    $result6 = $mysqli->query($viewPhotoQuery);
                        if ($result6->num_rows > 0) {
                            // output data of each row
                            while($row = $result6->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=6' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Movies</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewMoviesQuery = "SELECT * FROM Events WHERE genre = 2 ORDER BY startDate DESC LIMIT 5";
                    $result7 = $mysqli->query($viewMoviesQuery);
                        if ($result7->num_rows > 0) {
                            // output data of each row
                            while($row = $result7->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=7' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>
                    <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Music</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewMusicQuery = "SELECT * FROM Events WHERE genre = 3 ORDER BY startDate DESC LIMIT 5";
                    $result8 = $mysqli->query($viewMusicQuery);
                        if ($result8->num_rows > 0) {
                            // output data of each row
                            while($row = $result8->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=3' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul><h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Party</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewPartyQuery = "SELECT * FROM Events WHERE genre = 5 ORDER BY startDate DESC LIMIT 5";
                    $result9 = $mysqli->query($viewPartyQuery);
                        if ($result9->num_rows > 0) {
                            // output data of each row
                            while($row = $result9->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=5' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul></ul><h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Other</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewPartyQuery = "SELECT * FROM Events WHERE genre = 9 ORDER BY startDate DESC LIMIT 5";
                    $result10 = $mysqli->query($viewPartyQuery);
                        if ($result10->num_rows > 0) {
                            // output data of each row
                            while($row = $result10->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "
                    <div class='box'>
                        <div class='link-box'>
                            <i class='fas fa-arrow-circle-right is-size-1 has-text-info'></i>
                            <a href='./events.php?filter=9' class='is-size-5 view-more-text'>View more events 
                            <i class='fas fa-arrow-right view-more-arrow'></i></a>
                            </div>
                        </div>
                    </ul>";



                }
                else {

                    switch($filter){

                        case 0: 
                            echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Arts &amp; Crafts</h2>
                            <ul class='ViewAllEventsGridParent'>";
                    
                            $viewArtsNCraftsQuery = "SELECT * FROM Events WHERE genre = 0 ORDER BY startDate DESC";
                            $result = $mysqli->query($viewArtsNCraftsQuery);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                                }
                            }
                            echo "</ul>";
                        break;
                        
                        case 1:
                            echo "
                            <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Food &amp; Drinks</h2>
                            <ul class='ViewAllEventsGridParent'>";
                            $viewFoodQuery = "SELECT * FROM Events WHERE genre = 1 ORDER BY startDate DESC";
                            $result4 = $mysqli->query($viewFoodQuery);
                            if ($result4->num_rows > 0) {
                            // output data of each row
                            while($row = $result4->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                            echo "</ul>";
                        break;

                        case 2:
                            echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Movies</h2>
                            <ul class='ViewAllEventsGridParent'>";
                            $viewMoviesQuery = "SELECT * FROM Events WHERE genre = 2 ORDER BY startDate DESC";
                            $result7 = $mysqli->query($viewMoviesQuery);
                                if ($result7->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result7->fetch_assoc()){
                                        $eventID = $row['EventID'];
                                        $eventTitle = $row['eventTitle'];
                                        $eventDescription = $row['eventDescription'];
                                        $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                        $imageResult = $mysqli->query($imageQuery);
                                        list($eventImage) = mysqli_fetch_row($imageResult);
        
                                        echo "<li class='box'>";
                                        if ($eventImage === NULL) {
                                            echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                        }
                                        else{
                                            echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                        }
                                        echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                            <p class='is-size-6'>$eventDescription
                                            </p>
                                            <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                        </li>";
                                       
                                    }
                                }
                            echo "</ul>";
                        break;

                        case 3:
                            echo "
                            <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Music</h2>
                            <ul class='ViewAllEventsGridParent'>";
                        $viewMusicQuery = "SELECT * FROM Events WHERE genre = 3 ORDER BY startDate DESC LIMIT 5";
                        $result8 = $mysqli->query($viewMusicQuery);
                        if ($result7->num_rows > 0) {
                            // output data of each row
                            while($row = $result8->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "</ul>";
                        break;

                        case 4:
                            echo "
                            <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Outdoors &amp; Adventure</h2>
                            <ul class='ViewAllEventsGridParent'>";
                            $viewOutdoorsQuery = "SELECT * FROM Events WHERE genre = 4 ORDER BY startDate DESC";
                        $result5 = $mysqli->query($viewOutdoorsQuery);
                        if ($result5->num_rows > 0) {
                            // output data of each row
                            while($row = $result5->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "</ul>";
                        break;

                        case 5:
                            echo "
                            </ul><h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Party</h2>
                            <ul class='ViewAllEventsGridParent'>";
                    $viewPartyQuery = "SELECT * FROM Events WHERE genre = 5 ORDER BY startDate DESC LIMIT 5";
                    $result9 = $mysqli->query($viewPartyQuery);
                        if ($result9->num_rows > 0) {
                            // output data of each row
                            while($row = $result9->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                        echo "</ul>";
                        break;

                        case 6:
                            echo "
                            <h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Photography</h2>
                    <ul class='ViewAllEventsGridParent'>";
                    $viewPhotoQuery = "SELECT * FROM Events WHERE genre = 4 ORDER BY startDate DESC";
                    $result6 = $mysqli->query($viewPhotoQuery);
                        if ($result6->num_rows > 0) {
                            // output data of each row
                            while($row = $result6->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                    echo "</ul>";
                        break;
                        case 7: 
                            echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Sports &amp; Fitness</h2>
                        <ul class='ViewAllEventsGridParent'>";
                        $viewSportsNFitnessQuery = "SELECT * FROM Events WHERE genre = 7 ORDER BY startDate DESC";
                        $result2 = $mysqli->query($viewSportsNFitnessQuery);
                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while($row = $result2->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                            }
                        echo "</ul>";
                        break;
                        
                        case 8: 
                            echo "<h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Technology</h2>
                            <ul class='ViewAllEventsGridParent'>";
                            $viewTechQuery = "SELECT * FROM Events WHERE genre = 8 ORDER BY startDate DESC";
                            $result3 = $mysqli->query($viewTechQuery);
                            if ($result3->num_rows > 0) {
                            // output data of each row
                            while($row = $result3->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                            }
                        echo "</ul>";
                        break;
                        
                        case 9:
                            echo "
                            </ul><h2 class='is-size-3 has-text-weight-bold allEventsCategoryHeader'>Other</h2>
                            <ul class='ViewAllEventsGridParent'>";
                    $viewOtherQuery = "SELECT * FROM Events WHERE genre = 9 ORDER BY startDate DESC LIMIT 5";
                    $result10 = $mysqli->query($viewOtherQuery);
                        if ($result10->num_rows > 0) {
                            // output data of each row
                            while($row = $result10->fetch_assoc()){
                                $eventID = $row['EventID'];
                                $eventTitle = $row['eventTitle'];
                                $eventDescription = $row['eventDescription'];
                                $imageQuery = "SELECT imageName FROM EventImgs WHERE eventID = $eventID";
                                $imageResult = $mysqli->query($imageQuery);
                                list($eventImage) = mysqli_fetch_row($imageResult);

                                echo "<li class='box'>";
                                if ($eventImage === NULL) {
                                    echo "<img src='https://placekitten.com/400/200' alt='Event Image' />";
                                }
                                else{
                                    echo "<img src='./images/eventImages/$eventImage' alt='Event Image' />";
                                }
                                echo "<h1 class='is-size-4 has-text-weight-bold'>$eventTitle</h1>
                                    <p class='is-size-6'>$eventDescription
                                    </p>
                                    <a href='./singleEvent.php?viewEventID=$eventID' class='button is-info is-size-6 has-text-weight-bold'>View Event</a>
                                </li>";
                               
                            }
                        }
                        echo "</ul>";
                        break;

                    }

                }

                //Query for all events

                
                 ?>
                

        </div>
    </section>
    <!-- </ViewAllEvents> -->
    <?php $mysqli->close(); ?>

    <!-- <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script src="./js/scripts.js"></script>
    <script>
        const filters = $('.filters-panel-parents');

        $(".filters-panel-parents").slideUp(0);

        $("#showFiltersToggle").on("click", function (e) {
            e.preventDefault();

            if (filters.is(':visible')) {
                filters.slideUp(300);
            } else {
                filters.slideDown(300);
            }

            $("#EventsPageFilterArrow").toggleClass("arrowIsFlipped");
        })
    </script>
</body>

</html>
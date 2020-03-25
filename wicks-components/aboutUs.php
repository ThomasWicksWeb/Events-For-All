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
    <link rel="icon" href="./images/heyHand.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link href="https://fonts.googleapis.com/css?family=Muli:900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete Bootstrap 4 Website Layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="style.css" rel="stylesheet">
    <meta name="title" content="Title goes here">
    <meta name="keywords" content="Keywords go here">
    <meta name="description" content="Description goes here">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta property="og:image" content="./images/thumbnail.png" />
    <meta property="og:title" content="Title" />
    <meta property="og:description" content="Description" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- <script src="./vendor/smoothScroll.js"></script> -->


</head>

<body>
    <!-- <Navbar File> -->
    <?php require './navbar.php'; ?>



    <section class="hero is-link is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">The perfect virtual environment to set up events!</h1>
                <h2 class="subtitle"> For Everyone, Bringing Events Of All Types, To a Location Near You! </h2>
                <img src="./images/AboutUs/concert.jpg" alt="Concert">
            </div>
        </div>
    </section>

    <h1 class="display-2">About Us</h1>

    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm12 col-md-9 col-lg-9 col-xl-10">

                <p class="lead"> Events for all allows you to step out of your comfort zone. Whether it is meeting new
                    people, learning new tools at seminars, or simply pursusing your passion. Events For All has a place
                    for everyone. </p>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-6 col-xl-2">


            </div>
        </div>
    </div>


    <h2>How To Take Advantage Of Events For All As An Attendee </h2>

    <br>
    <br>
    <br>


    <div class="row">
        <div class="col-sm-3">
            <h2> Sports </h2>
            <img class="fullwidth aligncenter img-responsive size-full wp-image-305" src="./images/AboutUs/soccer.jpg" alt=""
                width="400" height="220" />
            <h6 class="topheader">Go out there and do something you love. The passion for sports runs deep. Events For
                All will allow you to enjoy the game you grew up envying. </h6>
        </div>

        <hr class="spacer short visible-xs" />

        <div class="col-sm-3">
            <h2> Travel & Explore </h2>
            <img class="fullwidth aligncenter img-responsive size-full wp-image-306" src="./images/AboutUs/explore.jpg" alt=""
                width="400" height="220" />
            <h6 class="topheader"> Take advantage of your surroundings. There are hidden gems all around us. We are
                uninformed and not utilizing the information around us. </h6>
        </div>

        <hr class="spacer short visible-xs" />



        <div class="col-sm-3">
            <h2> Photography </h2>
            <img src="./images/AboutUs/hike.jpg" alt="" width="400" height="220"
                class="fullwidth aligncenter img-responsive  size-full wp-image-427" />
            <h6 class="topheader"> Join staff from Hallock State Park Preserve on a 1 mile hike through the trails and
                bluffs, arriving at the beach for sunset. We will look for wildlife and signs of Spring along the way.
                Meet in the upper parking lot.
            </h6>
        </div>


        <div class="col-sm-3">
            <h2> Food & Wine </h2>
            <img src="./images/AboutUs/foodandwine.jpg" alt="" width="400" height="220"
                class="fullwidth aligncenter img-responsive  size-full wp-image-427" />
            <h6 class="topheader">Living on Long Island you have the opportunity to take advantage of some of the best
                wine and food cuisine in the country! Learn how to pair them through events held through restaurants.
            </h6>

        </div>





        <hr class="spacer" />



    </div>




    <hr class="spacer" />

    <br>

    <h2>Valuable Resources to Utilize As An Event Organizer </h2>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-sm-3">
            <h2> Network </h2>
            <img class="fullwidth aligncenter img-responsive size-full wp-image-305" src="./images/AboutUs/network.jpeg" alt=""
                width="400" height="220" />
            <h6 class="topheader">Get out there and meet new people. There is nothing stronger in this world than
                connections.</h6>
        </div>

        <hr class="spacer short visible-xs" />

        <div class="col-sm-3">
            <h2> Registration </h2>
            <img class="fullwidth aligncenter img-responsive size-full wp-image-306" src="./images/AboutUs/register3.jpg" alt=""
                width="400" height="300" />
            <h6 class="topheader">Take advantage of the fact that you have a list of registered user's who RSVP'd for
                your event to get a better handle on how to plan. </h6>
        </div>

        <hr class="spacer short visible-xs" />

        <div class="col-sm-3">
            <h2>Market Your Brand</h2>
            <img src="./images/AboutUs/computer.png" alt="" width="300" height="220"
                class="fullwidth aligncenter img-responsive  size-full wp-image-427" />
            <h6 class="topheader">Market your brand. Promote events in order to generate more business in the future!
            </h6>
        </div>

        <div class="col-sm-3">
            <h2>Resources</h2>
            <img src="./images/AboutUs/management.jpg" alt="" width="300" height="220"
                class="fullwidth aligncenter img-responsive  size-full wp-image-427" />
            <h6 class="topheader">As a host of an event, the manager resources available to you through our website are
                very valuable. You can hire plan accordingly, stock properly, and even track the exact number of people
                who are planning to come. As an "Event Manager", this is an application worthy of use. </h6>
        </div>
    </div>


    <section class="hero is-link is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Event Creators The Time Is Now! </h1>
                <input type="submit" class="btn btn-info" value="Create An Event">
                <br>
                <img src="./images/AboutUs/conference.jpg" alt="">
            </div>
        </div>
    </section>

    </div>





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
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

    <title>About Us | Events-4-All</title>

    <link rel="icon" href="./images/heyHand.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
    <!-- <Navbar File> -->
    <?php require './navbar.php'; ?>

    <section class="hero is-info is-fullheight-with-navbar">
        <div class="hero-body about-us-hero">
            <div class="bannerTintDarker">&nbsp;</div>
            <div class="container has-text-centered">
                <h1 class="title is-size-1">The perfect virtual environment to set up events!</h1>
                <h2 class="subtitle is-size-3">For everyone, bringing events of all types, to a location near you!</h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container helperMargin">
            <h3 class="is-size-2 has-text-weight-bold">About <i>Events-4-All</i></h3>
            <p class="is-size-5"><i>Events-4-All</i> is for the socialization you want, but might have trouble finding. There's already a great active community on the <i>Events-4-All</i> platform just waiting for you to join them!</p>
            <p class="is-size-5">Register for an account if you don't already have one, and once you're logged in you're free to start browsing and registering for any event you want! Interested in finding a yoga group, hiking group, D&amp;D group, or anything of the likes? We're sure you'll find others with similar interests, and if you can't, it's super easy to start hosting your own events!</p>
            <p class="is-size-5">So what are you waiting for? Let's check out some events!</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="has-text-centered is-size-2 has-text-weight-bold about-us-section-header helperMargin">Types of
                Events</h2>
            <ul class="about-us-columns">
                <li class="box">
                    <img src="./images/AboutUs/photography.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Photography</h2>
                    <h6 class="is-size-6"> Join staff from Hallock State Park Preserve on a 1 mile photography hike
                        through the trails and
                        bluffs, arriving at the beach for sunset. We will look for wildlife and signs of Spring along
                        the way!
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/sports.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Sports</h2>
                    <h6 class="is-size-6">Go out there and do something you love. The passion for sports runs deep.
                        Events For
                        All will allow you to enjoy the game you grew up envying.
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/travel.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Travel &amp; Explore</h2>
                    <h6 class="is-size-6"> Take advantage of your surroundings. There are hidden gems all around us. We
                        are
                        uninformed and not utilizing the information around us.
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/food.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Food &amp; Wine</h2>
                    <h6 class="is-size-6"> Living on Long Island you have the opportunity to take advantage of some of
                        the best
                        wine and food cuisine in the country! Learn how to pair them through events held through
                        restaurants.
                    </h6>
                </li>
            </ul>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="has-text-centered is-size-2 has-text-weight-bold about-us-section-header">Event Organizer
                Resources</h2>
            <ul class="about-us-columns">
                <li class="box">
                    <img src="./images/AboutUs/network.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Network with Others</h2>
                    <h6 class="is-size-6">Get out there and meet new people. There is nothing stronger in this world
                        than connections formed with others!
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/register.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Registration</h2>
                    <h6 class="is-size-6">Take advantage of the fact that you have a listed of registered users around
                        you! Sign up, attend events, and expand your social network with those that love the same things
                        you do
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/promote.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Promote Events</h2>
                    <h6 class="is-size-6">Promote your events in order to gain a larger following!
                    </h6>
                </li>
                <li class="box">
                    <img src="./images/AboutUs/resources.svg" />
                    <h2 class="is-size-4 has-text-weight-bold">Resources</h2>
                    <h6 class="is-size-6">As a host of an event, the administrator resources available to you are
                        extremely valuable. You can quickly and easily manage everything about your events, even down to
                        the smallest of details.
                    </h6>
                </li>
            </ul>
        </div>
    </section>


    <section class="hero is-info is-medium">
        <div class="hero-body about-us-hero-footer">
            <div class="bannerTintDarker">&nbsp;</div>
            <div class="container has-text-centered">
                <h1 class="title is-size-2">Event Creators, your time is now!</h1>
                <a href="./createAccount.php" class="subtitle is-size-5 button is-info">Sign up now</a>
            </div>
        </div>
    </section>

    <script src="./js/scripts.js"></script>
</body>

</html>
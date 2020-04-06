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

    <title>Home | Events-4-All</title>

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


    <!-- <HomePage> -->
    <section class="hero is-large" data-aos="fade-in" data-aos-duration="500">
        <div id="HeroBody" class="hero-body">
            <div class="bannerTint">&nbsp;</div>
            <div class="container">
                <h1 class="title has-text-weight-bold">Find your next outing, right near you!</h1>
                <h2 class="subtitle is-size-4">Let's get started!</h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="is-size-1 has-text-weight-bold has-text-centered">Check out some events</h2>
            <div class="homePageCategorySection">
                <h2 class="is-size-2 has-text-weight-bold">Sports</h2>
                <ul class="homePageCategorySectionEventsList">
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                    <li class="box">
                        <img src="http://placekitten.com/300/200" alt="">
                        <h3 class="is-size-4 has-text-weight-bold">Soccer with the boys</h3>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos dolore molestias corrupti deleniti numquam impedit quis amet! Eius, delectus at aut nihil autem voluptate culpa!</p>
                        <a href="#" class="button is-info">View Event</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- </HomePage> -->
  
    



    <script src="./js/scripts.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
    <script>
        // Setting image for Hero Banner for the home page
        let imageNumberHeroBanner = Math.floor((Math.random() * 3) + 1); 
        $('#HeroBody').css('background-image', `url(./images/HeroBanner/heroBanner-min-${imageNumberHeroBanner}.jpg)`);
    </script>
</body>

</html>
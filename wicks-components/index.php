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

    <!-- <LandingPage -->
    <section class="hero  is-fullheight-with-navbar">
        <div id="HeroBodyandingPage" class="hero-body" data-aos="fade-in" data-aos-duration="500">
            <div class="container">
                <div class="landingPageTextCont">
                    <h1 class="is-size-2 has-text-weight-bold">Welcome to Events-4-All!</h1>
                    <h2 class="is-size-3">Let's find an event near you</h2>
                    <div class="landingPageBtnCont">
                        <a class="button is-primary has-text-weight-bold" href="./login.php">Login</a>
                        <a class="button has-text-weight-bold" href="./createAccount.php">Create an Account</a>
                    </div>
                </div>
                <img id="LandingPageImg" src="" alt="Welcome!">
            </div>

        </div>
        <div id="IndexNotification" class="notification is-danger is-size-6 has-text-weight-bold">
            <button class="delete"></button>
            Hey there! Please note that with the current COVID-19 pandemic going on right now, we advise that all Events-4-All users <strong>please continue to follow social distancing guidlines.</strong> 
        </div>
    </section>
    <!-- </LandingPage -->




    <script src="./js/scripts.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
    <script>
        // Set random background image on the landing page
        let imageNumberLandingPage = Math.floor((Math.random() * 5) + 1);
        document.getElementById("LandingPageImg").src =
            `./images/LandingPage/LandingPage-${imageNumberLandingPage}.svg`;


        document.querySelector('.delete').addEventListener("click", () => {
            document.querySelector('.delete').parentElement.remove();
        })
    </script>
</body>

</html>
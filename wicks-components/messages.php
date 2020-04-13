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
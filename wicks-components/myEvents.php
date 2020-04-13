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

            <h2 class="is-size-3 has-text-weight-bold allEventsCategoryHeader">Hosting</h2>
            <ul class="ViewAllEventsGridParent">
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident.
                    </p>
                    <p class="is-size-6">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil eaque ipsum dolor harum ea,
                        commodi laudantium!
                    </p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <div class="box">
                    <div class="link-box">
                        <i class="fas fa-arrow-circle-right is-size-1 has-text-info"></i>
                        <a href="#" class="is-size-5 view-more-text">View more events <i
                                class="fas fa-arrow-right view-more-arrow"></i></a>
                    </div>
                </div>
            </ul>

            <h2 class="is-size-3 has-text-weight-bold allEventsCategoryHeader">Attending</h2>
            <ul class="ViewAllEventsGridParent">
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident.
                    </p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <div class="box">
                    <div class="link-box">
                        <i class="fas fa-arrow-circle-right is-size-1 has-text-info"></i>
                        <a href="#" class="is-size-5 view-more-text">View more events <i
                                class="fas fa-arrow-right view-more-arrow"></i></a>
                    </div>
                </div>
            </ul>

            <h2 class="is-size-3 has-text-weight-bold allEventsCategoryHeader">Attended</h2>
            <ul class="ViewAllEventsGridParent">
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident.
                    </p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <div class="box">
                    <div class="link-box">
                        <i class="fas fa-arrow-circle-right is-size-1 has-text-info"></i>
                        <a href="#" class="is-size-5 view-more-text">View more events <i
                                class="fas fa-arrow-right view-more-arrow"></i></a>
                    </div>
                </div>
            </ul>

        </div>
    </main>





    <script>

    </script>

    <script src="./js/scripts.js"></script>
</body>

</html>
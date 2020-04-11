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

    <title>Message | Events-4-All</title>

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
            <h1 class="has-text-weight-bold is-size-3">{{ person you're chatting with's name }}</h1>

            <!-- Duplicate this line each time you receive a message -->
            <div class="friendsMessages">
                <p class="is-size-6"><span class="has-text-weight-bold">{{ person msg is from }}</span> - {{ Their message }}</p>
            </div>
            <!-- Duplicate when you send a message -->
            <div class="myMessages">
                <p class="is-size-6 has-text-right">{{ Your message }}</p>
                <p class="is-size-6 has-text-right">{{ Your message }}</p>
                <p class="is-size-6 has-text-right">{{ Your message }}</p>
            </div>

            <form action="" class="SendMessageForm">
                <div class="field">
                    <div class="control">
                        <input id="SendMessageInput" class="input" type="text" placeholder="Your message">
                    </div>
                </div>
            </form>

        </div>
    </section>
  
    
<!-- 
    <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script src="./js/scripts.js"></script>
</body>

</html>
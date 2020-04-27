<?php 

//Start session and check logon status
session_start();
require('./methods/functions.php');


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
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
else{
    if($loggedon)
    header("Location: ./home.php");
    else
    header("Location: ./index.php");
}

if(isset($_GET["routed"])) {
    $routed = $_GET["routed"];
    
}
else {
    $routed = 0;
}

$route = parseRouting($routed);
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

    <title>Notification! | Events-4-All</title>

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

    <?php echo "<p class='has-text-centered is-size-5'>$message</p>"; 
    if ($loggedon)
    echo "<script> window.setTimeout(function() {window.location.replace('$route');}, 4*1000);</script>";
    else
    echo "<script> window.setTimeout(function() {window.location.replace('./index.php');}, 4*1000);</script>";
    
    ?>



    <script src="./js/scripts.js"></script>
</body>

</html>
<?php 

//Start session and check logon status
session_start();
if (isset($_SESSION['loggedon'])) {
	$loggedon = $_SESSION['loggedon'];
}
else {
	$loggedon = FALSE;
}

$mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll"); 

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}


if (isset($_GET['viewUser'])) {
	$userProfileID = $_GET['viewUser'];
}
else {
	header("Location: ./home.php");
}


 // Query database for user profile


 $query = "SELECT Users.userName, Users.city, Users.USstate, UserProfile.profileImg, UserProfile.bio, UserProfile.hobbies FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$userProfileID' AND UserProfile.userID = '$userProfileID'";
 $result = $mysqli->query($query);
 if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $viewedUserName = $row["userName"];
       $viewedProfileImg = $row["profileImg"];
       $viewedUserBio = $row["bio"];
       $viewedUserHobbies = $row["hobbies"];
       $viewedUserCity = $row["city"];
       $viewedUSerState = $row["USstate"];
   }
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

    <title>Events For All</title>

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


    <!-- <UserProfile> -->
    <section class="section">
        <div class="container userProfileParent">
            <div class="userProfileImg" style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
            <ul class="userProfileActionBar">
                <?php echo "<li class='has-text-weight-bold is-size-3'>$viewedUserName</li>" ;?>
                <li><a class="is-size-6 button is-primary" href="./addFriend.php/">Add Friend</a></li>
                <?php echo "<li><a class='is-size-6 button is-secondary' href='./sendMessage.php'>Message $viewedUserName</a></li>"; ?>
            </ul>
            <?php if($viewedProfileImg)
            echo "<img class='userProfileUserImg' src='./images/$viewedProfileImg.jpeg' alt=''>";
            else
            echo "<img class='userProfileUserImg' src='./images/jsmithImg1.jpeg' alt=''>";
            ?>
            <div class="userProfileContentBody">
                <div class="userProfileContentBodyShortBio">
                    <h3 class="is-size-4 has-text-weight-bold">Location</h3>
                    <?php echo "<p class='is-size-6'>$viewedUserCity, $viewedUSerState</p>";?>
                    <h3 class="is-size-4 has-text-weight-bold">Hobbies</h3>
                    <ul class="is-size-6">
                        <li>Volleyball</li>
                        <li>Gaming</li>
                        <li>Soccer</li>
                        <li>Dance</li>
                    </ul>
                    <h3 class="is-size-4 has-text-weight-bold">Subtitle</h3>
                    <p class="is-size-6">More information</p>
                </div>
                <div class="userProfileContentBodyLongBio">
                    <h2 class="is-size-3 has-text-weight-bold">About Me</h2>
                    <?php echo "<p class='is-size-6'>$viewedUserBio</p>"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- </UserProfile> -->
  
    

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
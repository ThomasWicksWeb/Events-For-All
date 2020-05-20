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

    <title>Profile | Events-4-All</title>

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
<?php //Connect to database
require './methods/databaseConnection.php';

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}

// Query database for user profile


$profileQuery = "SELECT Users.userName, Users.city, Users.USstate, UserProfile.profileImg, UserProfile.bio, UserProfile.hobbies FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$userID' AND UserProfile.userID = '$userID'";
$profileResult = $mysqli->query($profileQuery);
if ($profileResult->num_rows > 0) {
  // output data of each row
  while($row = $profileResult->fetch_assoc()) {
      $userName = $row["userName"];
      $profileImg = $row["profileImg"];
      $userBio = $row["bio"];
      $userHobbies = $row["hobbies"];
      $userCity = $row["city"];
      $userState = $row["USstate"];
      
  }
  $userHobbiesArray = explode(",", $userHobbies);
}

$mysqli->close();
?>

    <!-- <UserProfile> -->
    <section class="section">
            <div class="container userProfileParent">
                <div class="userProfileImg" style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
                <ul class="userProfileActionBar">
                    <li class="has-text-weight-bold is-size-3">MyProfile</li>
                    <li><a class="is-size-6 button is-info" href="./friends.php">Friends</a></li>
                    <li><a class="is-size-6 button is-secondary" href="./messages.php">Messages</a></li>
                    <li><a class="is-size-6 button is-secondary" href="./editProfile.php">Edit Profile</a></li>
                    
                </ul>
                <?php if($profileImg)
            echo "<img class='userProfileUserImg' src='./images/$userName/$profileImg' alt='User Profile Image'>";
            else
            echo "<img class='userProfileUserImg' src='./images/ProfilePhotoWithLogo.png' alt='User Profile Image'>";
            ?>
                <div class="userProfileContentBody">
                    <div class="userProfileContentBodyShortBio">
                        <h3 class="is-size-4 has-text-weight-bold">Location</h3>
                        <?php echo "<p class='is-size-6'>$userCity, $userState</p>";?>
                        <h3 class="is-size-4 has-text-weight-bold">Hobbies</h3>
                        <ul class="is-size-6">
                        <?php 
                        if($userHobbiesArray)
                        foreach($userHobbiesArray as $hobbie){
                            echo "<li>$hobbie</li>";
                        }
                        ?>
                        </ul>
                        <h3 class="is-size-4 has-text-weight-bold">Subtitle</h3>
                        <p class="is-size-6">More information</p>
                    </div>
                    <div class="userProfileContentBodyLongBio">
                        <h2 class="is-size-3 has-text-weight-bold">About Me</h2>
                        <?php echo "<p class='is-size-6'>$userBio</p>"; ?>
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
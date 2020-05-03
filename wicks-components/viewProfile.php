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

require './methods/databaseConnection.php'; 

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

if($userID == $userProfileID){
    header("Location: ./myProfile.php");
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
       $viewedUserState = $row["USstate"];
   }
   $viewedUserHobbiesArray = explode(",", $viewedUserHobbies);
 }

 if (($loggedon) && ($userID != NULL)){
    
    // Query database to create user
    $friendQuery = "SELECT friend1userID, friend2userID FROM Friendships WHERE friend1userID = '$userID' OR friend2userID = '$userID'";
    $friendResult = $mysqli->query($friendQuery);
    if ($friendResult->num_rows > 0) {
     $i = 0;
     $friendlist = array();
    // output data of each row
    while($row2 = $friendResult->fetch_assoc()) {
       $friend1userID = $row2["friend1userID"]; 
       $friend2userID = $row2["friend2userID"];
       if ($friend1userID == $userID) {
       $friendlist[$i] = $friend2userID;
        }
       else {
       $friendlist[$i] = $friend1userID;
       }
       $i++;
    }
    foreach($friendlist as $friend) {
        if ($userProfileID == $friend) {
            $friendsAlready = TRUE;
        }
    }
    }
    
    }
 $mysqli->close();
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


    <!-- <UserProfile> -->
    <section class="section">
        <div class="container userProfileParent">
            <div class="userProfileImg" style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
            <ul class="userProfileActionBar">
                <?php echo "<li class='has-text-weight-bold is-size-3'>$viewedUserName</li>" ;?>
                <?php if (!$friendsAlready) {
                echo "<li><a id='AddFriend' class='is-size-6 button is-primary' href='./addFriend.php/'>Add Friend</a></li>";}?>
                <?php echo "<li><a class='is-size-6 button is-secondary' href='./sendMessage.php'>Message $viewedUserName</a></li>"; ?>
            </ul>
            <?php if($viewedProfileImg)
            echo "<img class='userProfileUserImg' src='./images/$viewedUserName/$viewedProfileImg' alt=''>";
            else
            echo "<img class='userProfileUserImg' src='./images/ProfilePhotoWithLogo.png' alt=''>";
            ?>
            <div class="userProfileContentBody">
                <div class="userProfileContentBodyShortBio">
                    <h3 class="is-size-4 has-text-weight-bold">Location</h3>
                    <?php echo "<p class='is-size-6'>$viewedUserCity, $viewedUserState</p>";?>
                    <h3 class="is-size-4 has-text-weight-bold">Hobbies</h3>
                    <ul class="is-size-6">
                        <?php 
                        foreach($viewedUserHobbiesArray as $hobby){
                            echo "<li>$hobby</li>";
                        }
                        ?>
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
  
    <div id="modal" class="modal ">
        <div class="modal-background"></div>
        <div class="modal-content">
            <h5 class="is-size-4 has-text-weight-bold">Add friend?</h5>
            <p class="is-size-6">Are you sure you want to add this person as a friend??</p>
            <form action="<?php echo htmlspecialchars("./methods/addFriend.php");?>" method="POST">
                <div class="modal-button-cont">
                    <button id="sendInvites" class="button is-info">Add Friend</button>
                    <button id="cancelInvites" class="button is-danger">Cancel</button>
                </div>
             <?php echo "<input type='hidden' id='userID' name='addedFriendID' value='$userProfileID'>";?>
            </form>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>

    <!-- <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script> -->

    <script>
        const modalParent = $("#modal")
        const AddFriend = $("#AddFriend");
        const modalGreySpace = $(".modal-background");
        const modalClose = $(".modal-close");
        const modalCancel = $("#cancelInvites");
        const sendInvites = $("#sendInvites");

        const ToggleIsActive = () => {
            document.querySelectorAll('#modal').forEach(e => e.classList.toggle('is-active'));
        } 

        AddFriend.on("click", function(e){
            e.preventDefault();
            ToggleIsActive();
        });

        modalGreySpace.on("click", function(e){
            e.preventDefault();
            ToggleIsActive();
        });

        modalClose.on("click", function(e){
            e.preventDefault();
            ToggleIsActive();
        });

        modalCancel.on("click", function(e){
            e.preventDefault();
            ToggleIsActive();
        });

        /*sendInvites.on("click", function(e){
            e.preventDefault();
            alert("Friend invite sent!");
            ToggleIsActive();
        });*/
    </script>
    <script src="./js/scripts.js"></script>
</body>

</html>
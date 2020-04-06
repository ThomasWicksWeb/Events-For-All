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

if (($loggedon) && ($userName != NULL) && ($userID != NULL)){

    // Connect to MySQL and the EventsForAll Database
  $mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll");
  
  if ($mysqli->connection_error) {
      die("connection Failed: " . $mysqli->connection_error);
      echo "<script>console.log('Connection Error...')</script>";
  }
  else {
      echo "<script>console.log('Connected successfully...')</script>";
  }
  
  
  // Query database to create user
  $query = "SELECT friend1userID, friend2userID FROM Friendships WHERE friend1userID = '$userID' OR friend2userID = '$userID'";
 $result = $mysqli->query($query);
 if ($result->num_rows > 0) {
     $i = 0;
     $friendlist = array();
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $friend1userID = $row["friend1userID"]; 
       $friend2userID = $row["friend2userID"];
       if ($friend1userID === $userID) {
       $friendlist[$i] = $friend2userID;
        }
       else {
       $friendlist[$i] = $friend1userID;
       }
       $i++;
   }
}
  else {
    
  }
 
  }
  //var_dump($userID, $friend1userID, $friend2userID, $friendlist)
  
  
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

    <title>Friends | Events-4-All</title>

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


<!-- <MyFriends> -->
<section class="section">
            <div class="container">
                <h2 class="is-size-2 has-text-weight-bold has-text-centered">My Friends</h2>
                <ul class="myFriendsGridParent">
                    
                <?php 
              if ($friendlist){
                foreach($friendlist as $friendID){
                    $query2 = "SELECT Users.userName, UserProfile.profileImg FROM Users LEFT JOIN UserProfile ON Users.userID = UserProfile.userID WHERE Users.userID = '$friendID' AND UserProfile.userID = '$friendID'";
                    $result2 = $mysqli->query($query2);
                    if ($result2->num_rows > 0) {
                    // output data of each row
                        while($row2 = $result2->fetch_assoc()) {
                            $friendUserName = $row2["userName"]; 
                            $friendUserImg = $row2["profileImg"];
                        }
                    }

                    echo "<li class='myFriendsGrid box'>";?>
                           <?php 
                           if($friendUserImg)
                           echo "<img src='./images/$friendUserName/$friendUserImg' alt='Profile Photo' />";
                           else
                           echo "<img src='./images/ProfilePhotoWithLogo.png' alt='Profile Photo' />";
                           ?>
                <?php echo "<div class='myFriendsGridTextCont'>
                            <h4 class='is-size-4 has-text-weight-bold has-text-black'>$friendUserName</h4>
                            <a href='./viewProfile.php?viewUser=$friendID' class='is-link is-size-6'>View Profile</a>    
                            </div>
                            </li>";
                         
                }
            }
                else{
                        echo "<p class='has-text-centered is-size-5'>You Have No Friends Yet! :(</p>";
                    }
                    $mysqli->close();
                ?>
                </ul>
            </div>
        </section>
    <!-- </MyFriends> -->
  
    

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


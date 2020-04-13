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

$query = "SELECT profileImg FROM UserProfile WHERE  userID = '$userID'";
                    $result = $mysqli->query($query);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $userImg = $row["profileImg"];
                        }
                    }
$mysqli->close();
}

?>    

    <!-- <NavBar> -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand" style="padding-top: 0; padding-bottom: 0;">
            <a class="navbar-item" style="padding-top: 0; padding-bottom: 0;" href="https://events-4all.com">
                <img src="./images/LogoDark.PNG" alt="Events-4-All" width="112" height="28">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <?php 
		            if ($loggedon) {
                        echo "<a class='navbar-item' href='./home.php'>Home</a>";
                        // echo "<a class='navbar-item' href='./myProfile.php'>MyProfile</a>";
                        // echo "<a class='navbar-item' href='./friends.php'>Friends</a>";
		            }
		            else{
                        echo "<a class='navbar-item' href='./index.php'>Home</a>";
                    }
		        ?> 
                <a class="navbar-item" href="./events.php">Events Near Me</a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Categories</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item red">Sports & Fitness</a>
                        <a class="navbar-item">Tech</a>
                        <a class="navbar-item">Food & Drinks</a>
                        <a class="navbar-item">Outdoors & Adventure</a>
                        <a class="navbar-item">Photography</a>
                        <a class="navbar-item">Music</a>
                        <a class="navbar-item">Movies</a>
                        <a class="navbar-item">Other</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">Report an issue</a>
                    </div>
                </div>
                <a href="./aboutUs.php" class="navbar-item">About Events4All</a>
            </div>

            <div class="navbar-end">
           <?php if ($loggedon) {  echo "<div class='navbar-item has-dropdown is-hoverable'>
                        <a class='navbar-link'>";
                        if ($userImg) {
                           echo "<img src='./images/$userName/$userImg' class='navBarProfilePicture' alt='User Profile Picture'>";
                        }
                        else{
                            echo "<img src='./images/ProfilePhotoWithLogo.png' class='navBarProfilePicture' alt='User Profile Picture'>";
                        }
                        echo "<h3 class='is-size-6'>$userName</h3>
                        </a>
                        <div class='navbar-dropdown'>
                            <a class='navbar-item' href='./myProfile.php'>My Profile</a>
                            <a class='navbar-item' href='./myAccount.php'>My Account</a>
                            <a class='navbar-item' href='./friends.php'>Friends</a>
                            <a class='navbar-item' href='./messages.php'>Messages</a>
                            <a class='navbar-item' href=''>My Events</a>
                        </div>
                    </div> ";} ?>
                    <div class="navbar-item">
                        <div class="buttons">
                        <?php 
		                    if ($loggedon) {
                                echo "<a class='button is-light' href='./methods/logOut.php'>Log Out</a>";
		                    }
		                    else{
                                echo "<a class='button is-info' href='./createAccount.php'><strong>Sign up</strong></a>";
                                echo "<a class='button is-light' href='./login.php'>Log in</a>";
                            }
		                ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- </NavBar> -->
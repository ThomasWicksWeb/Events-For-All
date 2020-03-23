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

?>


    <!-- <NavBar> -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
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
                        echo "<a class='navbar-item' href='./myProfile.php'>MyProfile</a>";
                        echo "<a class='navbar-item' href='./friends.php'>Friends</a>";
		            }
		            else{
                        echo "<a class='navbar-item' href='./index.php'>Home</a>";
                    }
		        ?> 
                <a class="navbar-item" href="./events.php">Events Near Me</a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Categories</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">Sports & Fitness</a>
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
                        <a class='navbar-link'>
                            <img src='http://placekitten.com/50/50' class='navBarProfilePicture' alt='User Profile Picture'>
                           <h3 class='is-size-6'>$userName</h3>
                        </a>
                        <div class='navbar-dropdown'>
                            <a class='navbar-item' href='./myProfile.php'>Profile</a>
                            <a class='navbar-item' href='./myAccount.php'>My Account</a>
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
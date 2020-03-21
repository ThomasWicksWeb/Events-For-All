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

    <title>Site Title</title>

    <link rel="icon" href="./images/heyHand.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="./vendor/smoothScroll.js"></script> -->

</head>

<body>
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
    </nav>
    <!-- </NavBar> -->


    <!-- <CreateAnEvent> -->
    <section class="section">
        <div class="container">
            <form class="form" method="POST" action="<?php echo htmlspecialchars("./methods/processEvent.php");?>">
                <h2 class="is-size-2 has-text-weight-bold has-text-centered">Create an Event</h2>
                <h2 class="is-size-4 has-text-weight-bold has-text-centered">General Information</h2>
                <div class="field">
                    <label id="createEventTitle" class="label is-size-6">Event Title</label>
                    <div class="control has-icons-left">
                        <input id="eventTitle" class="input" name="eventTitle" required type="text" placeholder="Title">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="flexTwoFields">
                    <div class="field">
                        <label class="label is-size-6">Start Date<span
                                class="has-text-grey has-text-weight-normal">(YYYY/MM/DD)</span></label>
                        <div class="control has-icons-left">
                            <input id="CreateEventStartDate" autocomplete="off" class="input" name="startDate" required type="text"
                                placeholder="Start Date">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-size-6">End Date<span
                                class="has-text-grey has-text-weight-normal">(YYYY/MM/DD)</span></label>
                        <div class="control has-icons-left">
                            <input id="CreateEventEndDate" autocomplete="off" class="input" name="endDate" type="text"
                                placeholder="End Date">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flexTwoFields">
                    <div class="field">
                        <label class="label is-size-6">Start Time<span class="has-text-grey has-text-weight-normal">(24
                                hour format)</span></label>
                        <div class="control has-icons-left">
                            <input id="stateTime" class="input" name="startTime" required type="text"
                                placeholder="Start Time">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-size-6">End Time<span class="has-text-grey has-text-weight-normal">(24
                                hour format)</span></label>
                        <div class="control has-icons-left">
                            <input id="endTime" class="input" name="endTime" required type="text"
                                placeholder="End Time">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label id="DOBInput" class="label is-size-6">Description</label>
                    <div class="control has-icons-left">
                        <textarea id="description" name="description" placeholder="What's your event about?" required
                            class="textarea"></textarea>
                    </div>
                </div>

                <h2 class="is-size-4 has-text-weight-bold has-text-centered">Location Information</h2>

                <div class="field">
                    <label class="label is-size-6">Street</label>
                    <div class="control has-icons-left">
                        <input id="street" class="input" name="street" required type="text" placeholder="Street">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">City</label>
                    <div class="control has-icons-left">
                        <input id="city" class="input" name="city" required type="text" placeholder="City">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">State</label>
                    <div class="control has-icons-left">
                        <input id="state" class="input" name="state" required type="text" placeholder="State">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">ZIP Code</label>
                    <div class="control has-icons-left">
                        <input id="zip" class="input" name="zip" required type="text" placeholder="ZIP Code">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="control">
                    <label class="label is-size-6">Event Privacy</label>
                    <label class="radio">
                        <input type="radio" name="privacy" value="isPublic">Public</label>
                    <label class="radio">
                        <input type="radio" name="privacy" value="isPrivate">Private</label>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button value="submit" type="submit" class="button is-info has-text-weight-bold">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-danger is-light has-text-weight-bold">Cancel</button>
                    </div>
                </div>

                <script src="./js/scripts.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>
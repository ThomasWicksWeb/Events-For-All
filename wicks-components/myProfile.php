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
                                echo "<a class='button is-primary' href='./createAccount.php'><strong>Sign up</strong></a>";
                                echo "<a class='button is-light' href='./login.php'>Log in</a>";
                            }
		                ?> 
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- </NavBar> -->


    <!-- <UserProfile> -->
    <section class="section">
            <div class="container userProfileParent">
                <div class="userProfileImg" style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
                <ul class="userProfileActionBar">
                    <li class="has-text-weight-bold is-size-3">MyProfile</li>
                    <li><a class="is-size-6 button is-primary" href="./friends.php">Friends</a></li>
                    <li><a class="is-size-6 button is-secondary" href="./messages.php">Messages</a></li>
                    <li><a class="is-size-6 button is-secondary" href="#">Placeholder</a></li>
                    <li><a class="is-size-6 button is-secondary" href="#">Placeholder</a></li>
                </ul>
                <img class="userProfileUserImg" src="http://placekitten.com/200/200" alt="">
                <div class="userProfileContentBody">
                    <div class="userProfileContentBodyShortBio">
                        <h3 class="is-size-4 has-text-weight-bold">Location</h3>
                        <p class="is-size6">Farmingdale, NY</p>
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
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, blanditiis
                            voluptatibus? Sed
                            libero laborum animi quis nostrum provident nulla recusandae sapiente odit, iste dolorum. Unde
                            enim alias amet corrupti nisi.</p>
                        <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore
                            delectus mollitia amet.
                            Quas laboriosam vero sunt cupiditate quod voluptate sit, illo recusandae in voluptas quisquam
                            maxime labore unde hic a praesentium commodi est optio consequuntur.</p>
                        <p class="is-size-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus reiciendis
                            quia in fuga
                            consequatur asperiores ullam harum ipsam aspernatur eaque facere accusantium pariatur tenetur
                            fugit deserunt, veritatis vero quasi mollitia expedita nemo. Autem, inventore delectus quas
                            alias quidem cupiditate possimus qui numquam est consequuntur mollitia voluptatibus ut non
                            fugit, obcaecati expedita! Possimus, minima! Illo, magni quaerat veritatis eaque alias molestiae
                            neque, delectus consequatur earum ex sapiente fugit ad iusto eius a ratione! Natus animi, magnam
                            maiores cupiditate dicta neque voluptatibus quidem corrupti quaerat ex tempora. Amet
                            voluptatibus temporibus quam natus?</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- </UserProfile> -->
  
    

    <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            updateURL: false, // Update the URL on scroll
            emitEvents: true, // Emit custom events
            speed: 175 // 1.75 seconds to scroll to anchor point
        });
    </script>

    <script src="./js/scripts.js"></script>
</body>

</html>
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
                    <li class="has-text-weight-bold is-size-3">MyProfile</li>
                    <li><a class="is-size-6 button is-info" href="./friends.php">Friends</a></li>
                    <li><a class="is-size-6 button is-secondary" href="./messages.php">Messages</a></li>
                    <li><a class="is-size-6 button is-secondary" href="./editProfile.php">Edit Profile</a></li>
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
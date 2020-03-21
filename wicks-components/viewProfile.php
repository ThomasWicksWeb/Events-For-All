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

/*
if (isset($_SESSION['viewUserProfileID'])) {
	$userProfileID = $_SESSION['viewUserProfileID'];
}
else {
	header("Location: ./home.php");
}

*/
 // Query database for user profile


$userProfileID = 1;
 $query = "SELECT userName, profileImg FROM Users WHERE userID = '$userProfileID'";
 $result = $mysqli->query($query);
 if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $userName = $row["userName"];
       $profileImg = $row["profileImg"];
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
                <?php echo "<li class='has-text-weight-bold is-size-3'>$userName</li>" ;?>
                <li><a class="is-size-6 button is-primary" href="#">Add Friend</a></li>
                <?php echo "<li><a class='is-size-6 button is-secondary' href='./sendMessage.php'>Message $userName</a></li>"; ?>
                <li><a class="is-size-6 button is-secondary" href="#">Placeholder</a></li>
                <li><a class="is-size-6 button is-secondary" href="#">Placeholder</a></li>
            </ul>
            <?php echo "<img class='userProfileUserImg' src='./images/$profileImg.jpeg' alt=''>";?>
            <div class="userProfileContentBody">
                <div class="userProfileContentBodyShortBio">
                    <h3 class="is-size-4 has-text-weight-bold">Location</h3>
                    <p class="is-size-6">Farmingdale, NY</p>
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
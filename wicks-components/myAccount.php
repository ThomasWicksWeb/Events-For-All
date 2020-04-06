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

    <title>My Account | Events-4-All</title>

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

<?php

if (($loggedon) && ($userID !== NULL) && ($userName !== NULL)) {
    // Connect to MySQL and the EventsForAll Database
    $mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll"); 
    
    
    if ($mysqli->connection_error) {
        die("connection Failed: " . $mysqli->connection_error);
        echo "<script>console.log('Connection Error...')</script>";
    }
    else {
        echo "<script>console.log('Connected successfully...')</script>";
    }
    
    
    // Query database for user profile
    $query = "SELECT * FROM Users WHERE userName = '$userName'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
       while($row = $result->fetch_assoc()) {
            $userID = $row["userID"]; 
            $userName = $row["userName"];
            $email = $row["email"];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $street = $row["street"];
            $city = $row["city"];
            $state = $row["USstate"];
            $zip = $row["zip"];
            $phone = $row["phone"];
            $dob = $row["dateOfBirth"];
       }
            $areaCode = substr($phone, 0, 3);
            $localCode = substr($phone, 3, 3);
            $userCode = substr($phone, 6);

   $mysqli->close();         

    echo "
    <!-- <myAccount> -->
    <section class='section'>
            <div class='container'>
                <h1 class='is-size-2 has-text-weight-bold has-text-centered'>My Account Details</h1>

                <a href='./editAccount.php' class='button is-info is-pulled-right is-size-6'>Edit Details</a>

                <h2 class='is-size-3 has-text-weight-bold'>General</h2>
                <ul class='dataSetGrid'>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Username:</h5>
                        <p class='is-size-6'>$userName</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Email:</h5>
                        <p class='is-size-6'>$email</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>First Name:</h5>
                        <p class='is-size-6'>$firstName</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Last Name:</h5>
                        <p class='is-size-6'>$lastName</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Phone Number:</h5>
                        <p class='is-size-6'>($areaCode) $localCode - $userCode</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Date of Birth:</h5>
                        <p class='is-size-6'>$dob</p>
                    </li>
                </ul>

                <h2 class='is-size-3 has-text-weight-bold'>Location Details</h2>
                <ul class='dataSetGrid'>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Street:</h5>
                        <p class='is-size-6'>$street</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>City:</h5>
                        <p class='is-size-6'>$city</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>State:</h5>
                        <p class='is-size-6'>$state</p>
                    </li>
                    <li class='dataSet'>
                        <h5 class='is-size-5 has-text-weight-bold'>Zip Code:</h5>
                        <p class='is-size-6'>$state</p>
                    </li>
                </ul>


            </div>
        </section>
    <!-- </myAccount> --> ";
}     
 else {
     echo "<p class='is-size-4 has-text-centered'>Something went wrong... Please refresh the page to try again</p>";
 }   
    
}
?>    

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
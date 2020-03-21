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
<!-- <Navbar File> -->
<?php require './navbar.php'; ?>

    <!-- <EditAccountInformation> -->
    <section class="section">
        <div class="container">
            <form class="form" method="POST" action="">
                <h2 class="is-size-2 has-text-weight-bold has-text-centered">Edit Account</h2>
                <h2 class="is-size-4 has-text-weight-bold has-text-centered">Account Information</h2>

                <div class="field">
                    <label class="label is-size-6">Name</label>
                    <div class="control has-icons-left">
                        <input id="EditName" class="input" name="name" required type="text" value="{{Name}}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">Email</label>
                    <div class="control has-icons-left">
                        <input id="EditEmail" class="input" name="email" required type="text" value="{{Email}}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">DOB <span
                            class="has-text-grey has-text-weight-normal">(YYYY/MM/DD)</span></label>
                    <div class="control has-icons-left">
                        <input id="EditAccountInformationDOB" autocomplete="off" class="input" required type="text"
                            value="{(YYYY/MM/DD)}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <h2 class="is-size-4 has-text-weight-bold has-text-centered">Location Information</h2>

                <div class="field">
                    <label class="label is-size-6">Street <span class="has-text-grey has-text-weight-normal">(This will
                            not be shown publicly)</span>
                    </label>
                    <div class="control has-icons-left">
                        <input id="EditSteet" class="input" name="street" required type="text" value="{Street}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">City</label>
                    <div class="control has-icons-left">
                        <input id="EditCity" class="input" name="city" required type="text" value="{City}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">State</label>
                    <div class="control has-icons-left">
                        <input id="EditState" class="input" name="state" required type="text" value="{State}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-size-6">ZIP Code</label>
                    <div class="control has-icons-left">
                        <input id="EditZip" class="input" name="zip" required type="text" value="{ZIP Code}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button value="submit" type="submit" class="button is-info has-text-weight-bold">Submit
                            Changes</button>
                    </div>
                    <div class="control">
                        <button class="button is-danger is-light has-text-weight-bold">Cancel</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- </EditAccountInformation> -->
  
    

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
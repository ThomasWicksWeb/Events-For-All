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

    <title>Create Event | Events-4-All</title>

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
    <!-- <Navbar File> -->
    <?php require './navbar.php'; ?>

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

                <div id="maxGuastsParent" class="control">
                    <label class="label is-size-6">Guest limit?</label>
                    <label class="radio">
                        <input type="radio" required name="maxGuests" value="notLimited">No Limit</label>
                    <label class="radio">
                        <input id="isLimited" required type="radio" name="maxGuests" value="Limited">Limited</label>
                    <input id="maxGuestsTextInput" class="input" type="number" min="1" placeholder="How many guests are allowed?">
                </div>

                <label class="label is-size-6">Category</label>
                <div class="select createEventSelect">
                    <select name="category" required>
                        <option value="0">Arts &amp; Crafts</option>
                        <option value="1">Food &amp; Drinks</option>
                        <option value="2">Movies</option>
                        <option value="3">Music</option>
                        <option value="4">Outdoors &amp; Adventure</option>
                        <option value="5">Party</option>
                        <option value="6">Photography</option>
                        <option value="7">Sports &amp; Fitness</option>
                        <option value="8">Tech</option>
                        <option value="9">Other</option>
                    </select>
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
    <script>
        (function(){
            $("#CreateEventStartDate").datepicker({ dateFormat: 'yy/mm/dd' });
        })();

        (function(){
            $("#CreateEventEndDate").datepicker({ dateFormat: 'yy/mm/dd' });
        })();


        const isLimited = $("#isLimited");
        const maxGuastsParent = $("#maxGuastsParent");
        const maxGuestsTextInput = $("#maxGuestsTextInput");

        maxGuestsTextInput.fadeOut(300);

        maxGuastsParent.on("change", function(){
            console.log("Hello");
            if(isLimited.is(':checked')) {
                maxGuestsTextInput.fadeIn(300);
            } else {
                maxGuestsTextInput.fadeOut(300);
            }
        });

    </script>
</body>

</html>
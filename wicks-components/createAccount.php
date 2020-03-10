<?php 

//Start session and check logon status
session_start();
if (isset($_SESSION['loggedon'])) {
	$loggedon = $_SESSION['loggedon'];
}
else {
	$loggedon = FALSE;
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
                
		        <a class='navbar-item' href='./index.php'>Home</a>
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

<!-- <CreateAccountForm -->
    <!-- TODO: Add left icons for username and DOB fields -->
    <section class="section">
        <div class="container">
            <form class="form" method="POST" action="<?php echo htmlspecialchars("./methods/processAccount.php");?>">
            <h2 class="is-size-2 has-text-weight-bold has-text-centered">Create an Account</h2>
                <div class="field">
                    <label id="userNameInput"  class="label is-size-6">Username</label>
                    <div class="control has-icons-left">
                        <input id="userName" name="userName" class="input" required type="text" placeholder="Name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label id="DOBInput" class="label is-size-6">DOB <span
                            class="has-text-grey has-text-weight-normal">(YYYY/MM/DD)</span></label>
                    <div class="control has-icons-left">
                        <input id="AccountCreationDOB" autocomplete="off" name="dob" class="input" required type="text" placeholder="Date of Birth">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-size-6">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="emailInput" name="emailInput" required class="input" type="email" placeholder="Email" value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <!-- If we want icons on the righthand side of the input field, uncomment below -->
                            <!-- <i class="fas fa-exclamation-triangle"></i> -->
                        </span>
                    </div>
                    <!-- <p class="help is-danger">This email is invalid</p> -->
                </div>

                <div class="field">
                    <label class="label is-size-6">Confirm Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="confirmEmailInput" name="confirmEmailInput" required class="input" type="email" placeholder="Confirm Email"
                            value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <!-- If we want icons on the righthand side of the input field, uncomment below -->
                            <!-- <i class="fas fa-exclamation-triangle"></i> -->
                        </span>
                    </div>
                    <!-- <p class="help is-danger">This email is invalid</p> -->
                </div>

                <div class="field">
                    <label class="label is-size-6">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="passwordInput" name="passwordInput" required class="input" type="password" placeholder="Password" value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <!-- If we want icons on the righthand side of the input field, uncomment below -->
                            <!-- <i class="fas fa-exclamation-triangle"></i> -->
                        </span>
                    </div>

                </div>

                <div class="field">
                    <label class="label is-size-6">Confirm Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="confirmPasswordInput" name="confirmPasswordInput" required class="input" type="password" placeholder="Confirm Password"
                            value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <!-- If we want icons on the righthand side of the input field, uncomment below -->
                            <!-- <i class="fas fa-exclamation-triangle"></i> -->
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" required id="createTermsAndConditionsCheckbox">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button value="submit" type="submit" class="button is-info">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-danger is-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- </CreateAccountForm -->

  
    

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
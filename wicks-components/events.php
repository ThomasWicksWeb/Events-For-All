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



  <!-- <ViewAllEvents> -->
  <section class="section">
        <div class="container ViewAllEventsContainer">
            <h1 class="is-size-2 has-text-weight-bold has-text-centered">Browse Events</h1>

            <h2 class="has-text-weight-bold is-size-3">Filters</h2>

            <a href="#" class="button is-info EventsPageCreateEventBtn">Create New Event</a>

            <div class="filters-panel-parents">
                <div class="nav filtersList content">
                    <h2 class="has-text-weight-bold is-size-4">My Events</h2>
                    <ul>
                        <li>
                            <a id="filterMyEvents" class="link" href="./events.php?view=all">My Events</a>
                        </li>
                        <li>
                            <a id="filterMyAttending" class="link">Attending</a>
                        </li>
                        <li>
                            <a id="filterMyAttended" class="link">Attended</a>
                        </li> 
                    </ul>
                </div>
                <div class="nav filtersList content">
                    <h2 class="has-text-weight-bold is-size-4">All Events</h2>
                    <ul>
                        <li>
                            <a id="filterViewAll" class="link" href="./events.php?view=all">View All</a>
                        </li>
                        <li>
                            <a id="filterArtsAndCrafts" class="link">Arts &amp; Crafts</a>
                        </li>
                        <li>
                            <a id="filterSportsAndFitness" class="link">Sports &amp; Fitness</a>
                        </li> 
                        <li>
                            <a id="filterTech" class="link">Technology</a>
                        </li>
                        <li>
                            <a id="filterFoodAndDrinks" class="link">Food &amp; Drinks</a>
                        </li>
                        <li>
                            <a id="filterOutdoorsAndAdventure" class="link">Outdors &amp; Adventure</a>
                        </li>
                        <li>
                            <a id="filterPhotography" class="link">Photography</a>
                        </li>
                        <li>
                            <a id="filterMusic" class="link">Music</a>
                        </li>
                        <li>
                            <a id="filterMovies" class="link">Movies</a>
                        </li>
                        <li>
                            <a id="filterOther" class="butlinkton">Other</a>
                        </li>
                    </ul>
                </div>
                <div class="nav filtersList content">
                    <h2 class="has-text-weight-bold is-size-4">Local</h2>
                    <ul>
                        <li>
                            <a id="filterNearMe" class="link" href="#">Near Me</a>
                        </li>
                        <li>
                            <a id="filterRecentlyAdded" class="link">Recently Added</a>
                        </li>
                    </ul>
                </div>
            </div>

<!-- 
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <nav class="panel">
                <p class="panel-heading">Categories</p>

                <nav class="nav filtersList">
                    <a id="filterMyEvents" class="button" href="./events.php?view=all">My Events</a>
                    <a id="filterMyAttending" class="button">Attending</a>
                    <a id="filterMyAttended" class="button">Attended</a>
                </nav>

                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Search Events">
                        <span class="icon is-left">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>

                <nav class="nav filtersList">
                    <a id="filterViewAll" class="button" href="./events.php?view=all">View All</a>
                    <a id="filterArtsAndCrafts" class="button">Arts &amp; Crafts</a>
                    <a id="filterSportsAndFitness" class="button">Sports &amp; Fitness</a>
                    <a id="filterTech" class="button">Technology</a>
                    <a id="filterFoodAndDrinks" class="button">Food &amp; Drinks</a>
                    <a id="filterOutdoorsAndAdventure" class="button">Outdors &amp; Adventure</a>
                    <a id="filterPhotography" class="button">Photography</a>
                    <a id="filterMusic" class="button">Music</a>
                    <a id="filterMovies" class="button">Movies</a>
                    <a id="filterOther" class="button">Other</a>
                </nav>
            </nav> -->

            <h2 class="is-size-3 has-text-weight-bold allEventsCategoryHeader">Arts &amp; Crafts</h2>
            <ul class="ViewAllEventsGridParent">
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim repudiandae veritatis voluptatem
                    </p>
                    <p class="is-size-6">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil eaque ipsum dolor harum ea, commodi laudantium!
                    </p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident .</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident ducimus corrupti excepturi est! Molestias sunt, natus accusantium
                        commodi voluptatem odio architecto nulla aut iure. excepturi est! Molestias sunt, natus
                        accusantium commodi voluptatem odio architecto nulla aut iure.</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident ducimus corrupti excepturi est! Molestias sunt, natus accusantium
                        commodi voluptatem odio architecto nulla aut iure. excepturi est! Molestias sunt, natus
                        accusantium commodi voluptatem odio architecto nulla aut iure.</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <div class="box">
                    <div class="link-box">
                        <i class="fas fa-arrow-circle-right is-size-1 has-text-info"></i>
                        <a href="#" class="is-size-5 view-more-text">View more events <i class="fas fa-arrow-right view-more-arrow"></i></a>
                    </div>
                </div>
            </ul>

            <h2 class="is-size-3 has-text-weight-bold allEventsCategoryHeader">Food &amp; Drinks</h2>
            <ul class="ViewAllEventsGridParent">
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Pizza Party</h1>
                    <p class="is-size-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam delectus
                        nisi accusantium deserunt minima, cupiditate laudantium voluptate quae tenetur illo dignissimos
                        quis, excepturi earum unde non, commodi eligendi explicabo corrupti eveniet iste!</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Wine Tasting</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil consequuntur,
                        illum corporis deserunt explicabo nulla obcaecati cupiditate doloremque quae beatae fugit
                        nesciunt! Nihil velit perferendis excepturi ut culpa, provident ex molestiae, molestias placeat
                        laboriosam, facere exercitationem enim nisi. At dicta cupiditate iure soluta modi aut commodi
                        aperiam obcaecati incidunt, illo fugiat!</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident .</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident ducimus corrupti excepturi est! Molestias sunt, natus accusantium
                        commodi voluptatem odio architecto nulla aut iure. excepturi est! Molestias sunt, natus
                        accusantium commodi voluptatem odio architecto nulla aut iure.</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <li class="box">
                    <img src="https://placekitten.com/400/200" alt="" />
                    <h1 class="is-size-4 has-text-weight-bold">Event Title</h1>
                    <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quia nobis sit
                        explicabo maiores provident ducimus corrupti excepturi est! Molestias sunt, natus accusantium
                        commodi voluptatem odio architecto nulla aut iure. excepturi est! Molestias sunt, natus
                        accusantium commodi voluptatem odio architecto nulla aut iure.</p>
                    <a href="#" class="button is-info is-size-6 has-text-weight-bold">View Event</a>
                </li>
                <div class="box">
                    <div class="link-box">
                        <i class="fas fa-arrow-circle-right is-size-1 has-text-info"></i>
                        <a href="#" class="is-size-5 view-more-text">View more events <i class="fas fa-arrow-right view-more-arrow"></i></a>
                    </div>
                </div>
            </ul>

        </div>
    </section>
    <!-- </ViewAllEvents> -->
    

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
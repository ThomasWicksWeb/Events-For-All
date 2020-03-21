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



      <!-- <SingleEventPageBody> -->
      <section class="section">
        <div class="container singleEventBodyGridParent">
            <!-- NEED TO LOAD THE BACKGROUND-IMAGE HERE IN HTML -->
            <div class="singleEventBodyGridSplashImg"
                style="background-image: url('./placeholder/eventPageBanner.jpg')"></div>
            <div class="singleEventBodyGridActionsBar">
                <ul class="eventPageActionBar">
                    <li><a class="is-size-6 button is-info" href="#">Join Event</a></li>
                    <li><a class="is-size-6 button is-secondary" href="#">Message Organizers</a></li>
                    <li><a class="is-size-6 button is-secondary" href="#">View Antendees</a></li>
                    <li><a class="is-size-6 button is-secondary" href="#">Report Event</a></li>
                </ul>
            </div>
            <div class="singleEventBodyGridProfileImgAndEventInfo">
                <img src="http://placekitten.com/200/200" alt="">
                <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ullam sit non unde dolorum voluptate
                    nobis debitis ad, nulla suscipit molestiae, error sunt at possimus ex dignissimos aperiam est
                    corporis? Illum illo, harum amet nesciunt odit voluptatum velit aliquid quod minus<br><br>porro
                    voluptas veniam molestias quos ut error vero. Corrupti omnis culpa praesentium, excepturi sint in
                    quia quas sit animi optio placeat facere ipsum perferendis dolorem odio quae minus. Omnis aperiam
                    est in ad sit quidem, cupiditate et iure laudantium esse provident nemo veniam, nesciunt
                    voluptatibus tenetur quae officiis ipsa distinctio. Qui minima accusamus iste nulla placeat aperiam
                    id. Aspernatur.</p>
            </div>
            <div class="singleEventBodyGridEventDesc">
                <h1 class="is-size-3">Event title</h1>
                <h2 class="is-size-5">Event subtitle</h2>
                <p class="is-size-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident voluptatum,
                    numquam eveniet saepe quae dolore dicta, in exercitationem rerum reprehenderit asperiores? Tenetur
                    dolorum nobis officiis distinctio voluptatem quam animi nisi error quidem suscipit, quaerat in iure
                    veritatis expedita odio optio, asperiores temporibus illum nostrum similique tempora at. Tempore, at
                    officia esse minus cumque voluptate eum corporis repellat possimus fugiat illum vero nihil eveniet,
                    tenetur accusamus facilis repudiandae non molestias error, laborum architecto dolore rem? Impedit,
                    laboriosam cumque! Nobis consectetur placeat ratione beatae mollitia? Corporis, atque commodi, error
                    laborum quas consectetur sequi veniam corrupti sint iste, quae ducimus nemo optio perspiciatis!</p>
                <p class="is-size-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. In odio eius earum
                    facilis officiis perspiciatis, deleniti veritatis numquam corporis nobis esse nesciunt fuga,
                    voluptatibus voluptate qui harum error officia? Expedita voluptates ab voluptate quaerat harum eius
                    recusandae aliquam est, dolor neque eos iste unde ad esse placeat ratione dolore? Sit cupiditate
                    eveniet soluta provident illo temporibus aliquam repellat? Non officiis hic commodi, labore
                    aspernatur dolor assumenda impedit aliquam, necessitatibus ad error corrupti voluptatem itaque quis
                    eligendi officia laborum? Possimus veritatis autem nobis libero velit, magnam animi, ex id provident
                    atque veniam hic ducimus, fuga aspernatur dolore expedita eos eaque dignissimos. Ipsa tempora
                    laudantium porro nam veritatis placeat ab doloremque doloribus inventore nesciunt sed, illum nisi
                    amet exercitationem! Velit placeat nesciunt architecto eius magni maxime fuga dolore non sed
                    cupiditate. Voluptatem atque voluptatum quod porro aliquid illum laboriosam voluptate voluptates
                    nemo esse architecto quam, libero eum in? Consequatur maxime accusantium ipsam.</p>
                <p class="is-size-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque perspiciatis rerum
                    odit, corporis id molestias ipsum maxime beatae consequuntur cum, similique error aspernatur
                    suscipit atque? Molestiae, eligendi. Dolorem quaerat enim dignissimos nostrum vitae rem doloremque
                    ab doloribus, maiores, iure harum quis magni eos consequuntur voluptatum corrupti similique ea ad
                    tenetur optio? Quos optio atque nulla ullam itaque impedit cum quia?</p>
            </div>
            <div class="singleEventBodyGridAtendees">
                <h2 class="is-size-5">Event Organizers</h2>
                <ul>
                    <li class="antendeesListItem">
                        <img src="http://placekitten.com/50/50" alt="User Profile Icon">
                        <h4 class="is-size-5">John Smith</h4>
                        <h5 class="is-size-6">Event Founder</h5>
                    </li>
                    <li class="antendeesListItem">
                        <img src="http://placekitten.com/50/50" alt="User Profile Icon">
                        <h4 class="is-size-5">Mark Johnson</h4>
                        <h5 class="is-size-6">Atendee</h5>
                    </li>
                    <li class="antendeesListItem">
                        <img src="http://placekitten.com/50/50" alt="User Profile Icon">
                        <h4 class="is-size-5">Tim Erikson</h4>
                        <h5 class="is-size-6">Atendee</h5>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- </SingleEventPageBody> -->
    

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
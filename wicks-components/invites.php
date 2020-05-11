<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta name='title' content='Title goes here'>
  <meta name='keywords' content='Keywords go here'>
  <meta name='description' content='Description goes here'>
  <meta name='robots' content='index, follow'>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='language' content='English'>
  <meta property='og:image' content='./images/thumbnail.png' />
  <meta property='og:title' content='Title' />
  <meta property='og:description' content='Description' />

  <title>Invites | Events-4-All</title>

  <link rel='icon' href='./images/heyHand.png'>
  <link href='https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Muli:900&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='./css/bulma.min.css'>
  <link rel='stylesheet' href='./css/style.css'>
  <link href='https://unpkg.com/aos@2.3.1/dist/aos.css' rel='stylesheet'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
  <!-- <script src='./vendor/smoothScroll.js'></script> -->

</head>

<body>

  <!-- <Navbar File> -->
  <?php require './navbar.php'; ?>


  <section class='section'>
    <div class='container'>

      <h3 class="is-size-3 has-text-weight-bold has-text-centered">Invites</h3>

      <form action="" class="box">
        <h2 class="has-text-weight-bold is-size-4">{{ Event Invite Title }}</h2>
        <h3 class="is-size-5">Start date: <span class="has-text-light-grey">{{ Start Date }}</span> Start time: <span
            class="has-text-light-grey">{{ Start Time }}</span></h3>
        <h4 class='is-size-6'>Invited by: {{ name }}</h4>
        <a class='button is-link'>View Event</a>
        <button class='button is-info' type='submit'>Accept</button>
        <button class='button is-danger'>Decline</button>
      </form>
    </div>
  </section>



  <script src='./js/scripts.js'></script>
</body>

</html>
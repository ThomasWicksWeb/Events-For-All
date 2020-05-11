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
    <title>Send Message | Events-4-All</title>
    <link rel='icon' href='./images/heyHand.png'>
    <link href='https://fonts.googleapis.com/css?family=Karla:400,700|PT+Serif:700i&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Muli:900&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='./css/bulma.min.css'>
    <link rel='stylesheet' href='./css/style.css'>
    <link href='https://unpkg.com/aos@2.3.1/dist/aos.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>

  </head>

  <body>
    <!-- <Navbar File>-->
      <?php require './navbar.php';
?><section class='section'>
        <div class='container'>
          <h3 class="is-size-3 has-text-weight-bold has-text-centered">Send Message</h3>
          <form action="">
            <div class='field'><label class='label'>Send to: </label>
              <div class='control'><input class='input' disabled type='text' placeholder='Text input'
                  value='{{ User Name }}'></div>
            </div>
            <div class='field'><label class='label'>Subject: </label>
              <div class='control'><input class='input' type='text' required placeholder='Message Subject'></div>
            </div>
            <div class='field'><label class='label'>Message: </label>
              <div class='control'><textarea class="textarea" required placeholder="Text Body"></textarea></div>
            </div><button class='button is-info' type='submit'>Send</button>
          </form>
        </div>
      </section>
      <script src='./js/scripts.js'></script>
  </body>

  </html>
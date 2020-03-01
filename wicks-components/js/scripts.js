document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
  
      // Add a click event on each of them
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {
  
          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);
  
          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
  
        });
      });
    }


    // Set random background image on home page hero banner
    let imageNumber = Math.floor((Math.random() * 3) + 1); 
    // $("#HeroBody").style.backgroundImage = `./images/HeroBanner/heroBanner-${imageNumber}.jpg`;
    // document.getElementById("HeroBody").style.backgroundImage = `../images/HeroBanner/heroBanner-${imageNumber}.jpg`;
    $('#HeroBody').css('background-image', `url(./images/HeroBanner/heroBanner-${imageNumber}.jpg)`);

  
    // DOM Content Loaded listener ends
  });
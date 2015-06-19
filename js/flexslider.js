/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// Javascript file to initiate flexslider galleries

(function ($) {
$(window).load(function() {
  $('.flexslider').flexslider({ // initiates flexslider on frontpage
    animation: "fade",
    animationLoop: "true",
    slideshow: "true",
    slideshowSpeed: 7000,
    animationSpeed: 1200,
    controlNav: true // hides bullets below slideshow
  });
    $('.flexslider-events').flexslider({ // initiates flexslider for events
    animation: "fade",
    animationLoop: "true",
    slideshow: "true",
    slideshowSpeed: 7000,
    animationSpeed: 1200,
    controlNav: true // hides bullets below slideshow
  });
});

})(jQuery);
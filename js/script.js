/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function($) {

    /* duplicate the search button on the front page */
    

/* START: SMARTMENUS */

    // initialise smartmenus for main menu
    // $('#main-menu').smartmenus();

/* END: SMARTMENUS */

/* START: ISOTOPE */

    // add btn class to isotope filter lists for all views
    $(document).ready(function() {
        // $('ul.isotope-filters li>a').addClass('isotope-button'); // add a class to the button links

/* BEGIN: Feeling Lucky javascript */
    if (!Modernizr.touchevents) { 
        $( '<input type="submit" id="edit-submit-2" name="op" value="I\'m feeling lucky!" class="btn-primary btn form-submit"><div class="shuffler" role="button"><div class="pattern"><a href="http://www.paperwhite-studio.com/work/" target="_blank"><span>I\'m Feeling Creative</span></a><a href="http://www.paperwhite-studio.com/studio/" target="_blank"><span>I\'m Feeling Good</span></a><a href="http://www.paperwhite-studio.com/studio/" target="_blank"><span>I\'m Feeling Techy</span></a><a href="http://www.paperwhite-studio.com/news/" target="_blank"><span>I\'m Feeling Intrigued</span></a><a href="http://www.paperwhite-studio.com/contact/" target="_blank"><span>I\'m Feeling Social</span></a></div></div>' ).insertAfter( ".front #search-api-page-search-form-home .form-submit" );

         var button_offset = $('#edit-submit-2').offset();
         var left = button_offset.left;
         var top = button_offset.top;
         
         $('.shuffler').offset({ top: top, left: left });
         
         $('.shuffler').hover(function() {
           $('.shuffler').css('opacity', '1');
           do {
             var random = Math.floor(Math.random() * 5 - 3);
           } while(random == 0);
           console.log(random);
           console.log(-random * 34);
           $('.shuffler .pattern').animate({
             top: -102 + -random * 34,
           }, 400, function() {
             // Animation complete.
           });
         }, function() {
           $('.shuffler').css('opacity', '0');
         });
     }
     else {
        $( '<input type="submit" id="edit-submit-2" name="op" value="I\'m feeling lucky!" class="btn-primary btn form-submit">').insertAfter( ".front #search-api-page-search-form-home .form-submit" );
     }
         
/* END: Feeling Lucyk javascript */

        // modal window for showcasing the icons
        //$('#icons').modal(options);
        $('#icons button.close').click(function() {
            $('#icons').fadeOut("fast");
        });

        $('.front .halflings-th').click(function() {
            $('#icons').fadeIn("fast");
        });
        $('#icons-mobile button.close').click(function() {
            $('#icons-mobile').fadeOut("fast");
        });

        $('.front .halflings-th').click(function() {
            $('#icons-mobile').fadeIn("fast");
        });

    });
})(jQuery);



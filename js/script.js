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
        $( '<input type="submit" id="edit-submit-2" name="op" value="I am feeling lucky!" class="btn-primary btn form-submit">' ).insertAfter( ".front #search-api-page-search-form-home .form-submit" );

        // modal window for showcasing the icons
        //$('#icons').modal(options);
        $('#icons button.close').click(function() {
            $('#icons').fadeOut("fast");
        });
    });
})(jQuery);



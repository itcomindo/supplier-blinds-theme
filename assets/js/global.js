window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        // get body class
        var $bodyClass = jQuery('body').attr('class');
        if ($bodyClass.includes('home')) {
            // mm_rotate_global_discount_banner_on_home_hero();
        }




        /**
        =========================
        *NAME: mm_load_fpc
        *DESCRIPTION: Load FPC Global
        *=========================
        */
        mm_load_fpc();
        function mm_load_fpc() {
            var $fpc = jQuery('#fpc-home');
            function toggleFpc() {
                $fpc.toggleClass('active');
                jQuery('body').toggleClass('no-scroll');
            }
            jQuery('#prod-menu-trigger, .prod-menu-trigger').click(toggleFpc);
            jQuery('#fpc-home').click(toggleFpc);
        }

        mm_load_fcontact();
        function mm_load_fcontact() {
            var $fcontact = jQuery('#fcontact');
            function toggleFcontact() {
                $fcontact.toggleClass('active');
                jQuery('body').toggleClass('no-scroll');
            }
            jQuery('.fcont-trigger').click(toggleFcontact);
            jQuery('#fcontact').click(toggleFcontact);
        }








        /**
        =========================
        *NAME: mm_rotate_global_discount_banner_on_home_hero
        *DESCRIPTION: Show only in home page
        *=========================
        */
        function mm_rotate_global_discount_banner_on_home_hero() {
            setTimeout(function () {
                jQuery('#hero .global-discount').addClass('animate__rubberBand');
            }, 1000);

            setTimeout(function () {
                jQuery('#hero .global-discount').addClass('rotate');
            }, 1000);
        }

        /*=========================jquery end abov this line=========================*/


    });


});
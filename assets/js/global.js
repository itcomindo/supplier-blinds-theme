window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        // get body class
        var $bodyClass = jQuery('body').attr('class');
        if ($bodyClass.includes('home')) {
            mm_rekanan_slider();
            mm_footer_discount_banner_home();
        } else if ($bodyClass.includes('single')) {
            mm_footer_discount_banner_single();
        }


        /**
        =========================
        * Desktop Whatsapp
        *=========================
        */

        if (jQuery(window).width() > 540) {
            mm_desktop_whatsapp();
        }

        function mm_desktop_whatsapp() {
            var $greeting = jQuery('#greeting');
            var $desktopWhatsapp = jQuery('#dwa');
            var desktopWhatsappClose = jQuery('#dwa-close');
            $greeting.click(function () {
                jQuery(this).slideUp().removeClass('animate__backInUp');
                $desktopWhatsapp.addClass('active');
            });
            desktopWhatsappClose.click(function () {
                $desktopWhatsapp.removeClass('active');
                $greeting.slideDown().addClass('animate__backInUp');
            });

        }




        /**
        =========================
        *NAME: mm_footer_discount_banner_home
        *=========================
        */
        function mm_footer_discount_banner_home() {
            jQuery('.global-discount.fm-banner').click(function () {
                jQuery('#fm-berlaku').toggleClass('active');
            });
        }

        /**
        =========================
        *NAME: mm_footer_discount_banner_single
        *=========================
        */
        function mm_footer_discount_banner_single() {
            jQuery('.arc-global-discount.footer').click(function () {
                jQuery('#fm-berlaku').toggleClass('active');
            });
        }


        /**
        =========================
        * Search Modal
        *=========================
        */
        mm_launch_search_modal();
        function mm_launch_search_modal() {

            /*=========================Open Search Modal=========================*/
            jQuery('.search-modal-trigger').click(function () {
                jQuery('#search-modal').toggleClass('active');
                jQuery('body').addClass('no-scroll');
            });

            /*=========================Close Search Modal=========================*/
            jQuery('#search-modal-close').click(function () {
                jQuery('#search-modal').removeClass('active');
                jQuery('body').removeClass('no-scroll');
            });



        }


        /**
        =========================
        * Rekanan Slider
        *=========================
        */
        function mm_rekanan_slider() {
            jQuery('#rekanan-item-wr, #testi-item-wr').flickity({
                // options
                cellAlign: 'center',
                contain: true,
                prevNextButtons: false,
                autoPlay: false,
                wrapAround: true,
                pageDots: false,
            });

            mm_rekanan_image_width_detector();
            jQuery(window).resize(function () {
                mm_rekanan_image_width_detector();
            });
        }


        /**
        =========================
        * Rekanan Image Width Detector
        *=========================
        */
        function mm_rekanan_image_width_detector() {
            var imgs = jQuery('img.rekanan-img');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }


        /**
        =========================
        * Rekanan Image Width Detector
        *=========================
        */
        mm_find_image_width_height();
        jQuery(window).resize(function () {
            mm_find_image_width_height();
        });
        function mm_find_image_width_height() {
            var imgs = jQuery('img.find-this');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }


        /**
        =========================
        * Replace Potongan Harga
        *=========================
        */
        mm_rep();
        function mm_rep() {
            var teksLama = jQuery('.global-discount.fm-banner .potongan-harga').text();
            var teksBaru = teksLama.replace(teksLama, 'Promo Upto');
            jQuery('.global-discount.fm-banner .potongan-harga').text(teksBaru);
        }

        /**
        =========================
        *NAME: mm_load_fpc
        *DESCRIPTION: Load FPC Global
        *=========================
        */
        mm_load_fpc();
        function mm_load_fpc() {
            jQuery('.prod-menu-trigger').click(function () {
                jQuery('#flocat').toggleClass('active');
                jQuery('body').toggleClass('no-scroll');
            });
            jQuery('#flocat-close').click(function () {
                jQuery('#flocat').removeClass('active');
                jQuery('body').removeClass('no-scroll');
            });
        }


        /**
        =========================
        * tab in fpc
        *=========================
        */
        mm_tab_in_fpc();
        function mm_tab_in_fpc() {
            var tabTrigger = jQuery('#flocat-choise-head .flocat-trigger'); // Pemicu tab.
            jQuery(tabTrigger).on('click', function () {
                jQuery('#flocat-choise-head .flocat-trigger').removeClass('active'); // Hapus kelas active dari semua pemicu.
                jQuery(this).addClass('active'); // Tambahkan kelas active ke pemicu yang diklik.
                var dataTab = jQuery(this).data('tab'); // Ambil nilai data-tab.
                // Cari elemen dengan data-tab yang sama di bawah flocat-choise-content, kemudian ubah kelasnya.
                jQuery('#flocat-choise-content .flocat-tab-content').removeClass('show').addClass('hide'); // Sembunyikan semua tab.
                jQuery('#flocat-choise-content .flocat-tab-content[data-tab="' + dataTab + '"]').removeClass('hide').addClass('show'); // Tampilkan tab yang sesuai.
            });
        }


        /**
        =========================
        * Load FPC Contact
        * DESCRIPTION: Load Floating Contact
        *=========================
        */

        mm_load_fcontact();
        function mm_load_fcontact() {
            var $fcontact = jQuery('#fcontact');
            var $fmBanner = jQuery('.global-discount.fm-banner');
            function toggleFcontact() {
                $fcontact.toggleClass('active');
                $fmBanner.toggleClass('hide');
                jQuery('body').toggleClass('no-scroll');
            }
            jQuery('.fcont-trigger').click(toggleFcontact);
            jQuery('#fcontact').click(toggleFcontact);
        }


        /**
        =========================
        * Add animate to .global-discount.fm-banner
        *=========================
        */
        jQuery('.global-discount.fm-banner').addClass('animate__animated animate__bounceInDown animate__delay-1s');








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
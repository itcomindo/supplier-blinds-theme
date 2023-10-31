window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        // get body class
        var $bodyClass = jQuery('body').attr('class');
        if ($bodyClass.includes('home')) {
            // mm_rotate_global_discount_banner_on_home_hero();
            mm_rekanan_slider();
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
                // pageDots: false,
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
            // Cari lebar dan tinggi gambar, kemudian buat atribut lebar dan tinggi.
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

        jQuery('.global-discount.fm-banner').click(function () {
            jQuery('#fm-berlaku').toggleClass('active');
        });


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
            jQuery('.prod-menu-trigger').click(toggleFpc);
            jQuery('#fpc-home').click(toggleFpc);
        }

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
<?php

/**
 * File singular.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;
get_header();


if (is_single()) {
    get_template_part('template-parts/contents/single-content');
} elseif (is_page()) {
    get_template_part('template-parts/contents/page-content');
}

get_footer();


?>

<script>
    jQuery(function() {
        // Mengambil teks yang akan difilter berdasarkan data-author pada #aut-bot.
        var authorToFilter = jQuery.trim(jQuery('#related-post-wr').data('author').toString());
        console.log(authorToFilter);

        // Mengiterasi setiap li dengan kelas 'aut-filter'.
        jQuery('.prod-title a.aut-filter').each(function() {
            // Mengambil teks dari elemen li saat ini.
            var liText = jQuery(this).text();

            // Memeriksa apakah teks elemen li mengandung teks yang akan difilter.
            if (liText.indexOf(authorToFilter) !== -1) {
                // Mengganti teks yang cocok dengan string kosong.
                var newLiText = liText.replace(authorToFilter, '');
                jQuery(this).text(newLiText);
            }
        });
    });
</script>
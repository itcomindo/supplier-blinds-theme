<?php

/**
 * File plugins.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

//disable gutenberg.
add_filter('use_block_editor_for_post', '__return_false', 10);



/**
 * Function mm_ubah_h2_ke_h3
 * Description: Ubah tag h2 ke h3 hanya pada halaman tag
 */

function mm_ubah_h2_ke_h3($konten)
{
    if (is_tag()) {
        $konten = str_replace('<h2', '<h3', $konten);
        $konten = str_replace('</h2>', '</h3>', $konten);
        return $konten;
    } else {
        return $konten;
    }
}
add_filter('the_content', 'mm_ubah_h2_ke_h3');



require_once get_template_directory() . '/inc/plugins/schema-local-business.php';
require_once get_template_directory() . '/inc/plugins/breadcrumbs.php';
require_once get_template_directory() . '/inc/plugins/seo.php';

<?php

/**
 * ACF Post Fields
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


function mm_acf_post_alamat()
{
    if (is_tag()) {
        $tag_id = get_queried_object()->term_id;
        $post_id = get_posts(array(
            'numberposts' => 1,
            'tag_id' => $tag_id,
            'post_type' => 'post',
            'fields' => 'ids'
        ));
        $post_id = $post_id[0];
        $alamat = get_field('alamat', $post_id);
        $kota = get_field('city', $post_id);
        $provinsi = get_field('provinsi', $post_id);
        $kodepos = get_field('kodepos', $post_id);
        $apaan = [
            'alamat' => $alamat,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'kodepos' => $kodepos
        ];


        return $apaan;
    }
}

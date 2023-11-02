<?php

/**
 * Custom Featured Image
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;





function mm_custom_featured_image()
{
    if (is_single()) {
        $jenis = get_field('jenis_blinds');
        $featured_image = mm_get_custom_featured_image($jenis);
        if ($featured_image) {
            return esc_url($featured_image);
        }
    } elseif (is_tag()) {
        $tag_id = get_queried_object()->term_id;
        $post_id = get_posts(array(
            'numberposts' => 1,
            'tag_id' => $tag_id,
            'post_type' => 'post',
            'fields' => 'ids'
        ));
        $post_id = $post_id[0];
        $jenis = get_field('jenis_blinds', $post_id);
        $featured_image = mm_get_custom_featured_image($jenis);
        if ($featured_image) {
            return esc_url($featured_image);
        }
    } else {
        $jenis = get_field('jenis_blinds');
        $featured_image = mm_get_custom_featured_image($jenis);
        if ($featured_image) {
            return esc_url($featured_image);
        }
    }
}

function mm_get_custom_featured_image($jenis)
{
    // Menggunakan parameter yang sudah diberikan, tidak perlu penugasan ulang .
    $upload_dir = wp_upload_dir();
    $extension = '.webp';

    // Menggunakan glob untuk mencari file dengan ekstensi .webp dalam direktori yang spesifik .
    $files = glob($upload_dir['basedir'] . '/' . $jenis . '/*' . $extension);

    // Memeriksa apakah ada file yang ditemukan .
    if ($files) {
        $file_key = array_rand($files); // Mendapatkan kunci array secara acak .
        $file_path = $files[$file_key]; // Mendapatkan file path dari kunci tersebut .
        $file_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $file_path); // Mengonversi path ke URL .
        return $file_url; // Mengembalikan URL dari gambar yang dipilih .
    }

    return false; // Mengembalikan false jika tidak ada file yang ditemukan .
}

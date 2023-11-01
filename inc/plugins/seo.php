<?php

/**
 * SEO
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
// Menghapus default tag title WordPress.
remove_action('wp_head', '_wp_render_title_tag', 1);
//remove default wordpress robots tag
remove_action('wp_head', 'noindex', 1);
// Menghapus link RSS feed dari seluruh situs.
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
// Menghapus CSS block library dari WordPress.
function mm_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'mm_remove_wp_block_library_css');
// Menghapus meta tag generator dari head.
remove_action('wp_head', 'wp_generator');
// Menghapus dukungan emoji, termasuk inline styles.
function mm_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'mm_disable_emojis');
// Modifikasi tag robots pada halaman pencarian.
function mm_buffer_start()
{
    ob_start("mm_callback");
}
// Callback function untuk mengganti tag robots.
function mm_callback($buffer)
{
    if (is_search()) {
        $buffer = preg_replace('/<meta name=\'robots\' content=\'([^\']*)\' \/>/', '<meta name=\'robots\' content=\'index, follow\' />', $buffer);
    }
    return $buffer;
}
// Flush output buffer.
function mm_buffer_end()
{
    ob_end_flush();
}
// Menambahkan action.
add_action('wp_head', 'mm_buffer_start', -1); // Pastikan ini dijalankan pertama kali.
add_action('wp_footer', 'mm_buffer_end'); // Pastikan ini dijalankan terakhir.


function mm_noindex_feed()
{
    if (is_feed()) {
        echo '<xhtml:meta xmlns:xhtml="http://www.w3.org/1999/xhtml" name="robots" content="noindex"></xhtml:meta>';
    }
}
add_action('rss2_ns', 'mm_noindex_feed');



function mm_seo()
{
    $domain_name = $_SERVER['HTTP_HOST'];
    if (is_home() || is_front_page()) {
        $title = 'Supplier Blinds (Distributor Tirai Window Blinds) Interior Design Lengkap dan Murah';
        $description = 'Supplier Toko Agen Distributor Roller Blinds, Vertical Blinds, Roman Shades, Gordyn, Horizontal Blinds, Wooden Blinds, Zebra Blinds, Outdoor Blinds, PVC Blinds, Gorden Rumah Sakit dan Interior Design Lainnya';
        $robots = 'index, follow';
    } elseif (is_single() || is_page()) {
        $title = get_the_title();
        $description = substr(get_the_title() . ' ' . get_the_excerpt(), 0, 160);
        $robots = 'index, follow';
    } elseif (!is_category('Supplier')) {
        $title = 'Jual Produk ' . single_cat_title('', false) . ' Terbaik Berkualitas Harga Murah';
        $description = 'Jual Produk ' . single_cat_title('', false) . ' Terbaik Berkulaitas Harga Termurah di ' . $domain_name . ' - Supplier Blinds (Distributor Tirai Window Blinds)';
        $robots = 'index, follow';
    } elseif (is_category('Supplier')) {
        $title = 'Supplier Produk Interior Design Tirai Gorden Window Blinds Terlengkap dan Termurah';
        $description = 'Supplier Toko Agen Distributor Roller Blinds, Vertical Blinds, Roman Shades, Gordyn, Horizontal Blinds, Wooden Blinds, Zebra Blinds, Outdoor Blinds, PVC Blinds, Gorden Rumah Sakit dan Interior Design Lainnya';
        $robots = 'index, follow';
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
        $description = single_tag_title('', false) . ' Terbaru dan Terlengkap di ' . $domain_name;
    } elseif (is_author()) {
        $title = get_the_author_meta('display_name');
        $description = 'Supplier Distributor Agen Toko Jual Window Blinds di ' . get_the_author_meta('display_name');
    } elseif (is_search()) {
        $title = 'Search: ' . get_search_query();
        $description = 'Produk dan Supplier Agen Distributor Window Blinds ' . get_search_query();
        $robots = 'index, follow';
    } elseif (is_404()) {
        $title = 'Ups! Halaman Tidak Ditemukan';
        $description = 'Halaman yang anda cari tidak ditemukan';
        $robots = 'noindex, nofollow';
    } else {
        $title = get_bloginfo('name');
        $description = get_bloginfo('description');
    }
    echo '<title>' . $title . "</title>\n";
    echo '<meta name="description" content="' . $description . "\">\n";
    if (!is_search()) {
        echo '<meta name="robots" content="' . $robots . "\">\n";
    }


    echo "<meta property='og:title' content='$title' />\n";
    echo "<meta property='og:description' content='$description' />\n";
    if (is_single()) {
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        echo "<meta property='og:image' content='$thumbnail_url' />\n";
    }

    if (is_tag() || is_category()) {
        $term = get_queried_object();
        $term_link = get_term_link($term);
        echo "<meta property='og:url' content='" . $term_link . "' />\n";
    } else {
        echo "<meta property='og:url' content='" . get_the_permalink() . "' />\n";
    }



    echo "<meta property='og:type' content='article' />\n";
    echo "<meta property='og:site_name' content='" . get_bloginfo('name') . "' />\n";
}
add_action('wp_head', 'mm_seo', 1);

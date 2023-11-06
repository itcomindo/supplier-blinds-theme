<?php

/**
 * Template Name: Sitemap
 *
 * Tema ini menyediakan tampilan halaman sitemap yang terstruktur.
 * 
 * @package MasmonsTheme
 * @subpackage Sitemap
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 0.19
 */

defined('ABSPATH') || exit; // Memastikan skrip tidak dapat diakses langsung.

get_header();

// Memeriksa apakah halaman saat ini adalah halaman 'Sitemap'.
if (is_page('sitemap')) { // Memastikan halaman yang dimaksud adalah 'Sitemap'.
?>
    <section class="section">
        <div class="container">
            <h1>Sitemap</h1>
            <div id="sitemap-wr">
                <div id="sitemap-page">
                    <?php echo mm_show_page_sitemap(); ?>
                </div>
                <div id="sitemap-post">
                    <?php echo mm_show_post_sitemap(); ?>
                </div>
                <div id="sitemap-cat">
                    <?php echo mm_show_category_sitemap(); ?>
                </div>
                <div id="sitemap-tag">
                    <?php echo mm_show_tag_sitemap(); ?>
                </div>
            </div>
        </div>
    </section>
<?php
}

get_footer();
/**
 * Fungsi untuk menampilkan daftar halaman dalam sitemap.
 * @return string
 */
function mm_show_page_sitemap()
{
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
    );

    $pages = get_pages($args);
    $output = '<ul class="mm-sitemap-pages">';

    foreach ($pages as $page) {
        $output .= sprintf(
            '<li><a href="%1$s">%2$s</a></li>',
            esc_url(get_permalink($page->ID)),
            esc_html($page->post_title)
        );
    }

    $output .= '</ul>';
    return $output; // Mengembalikan daftar halaman dalam bentuk list HTML.
}

/**
 * Fungsi untuk menampilkan daftar posting dalam sitemap.
 * @return string
 */
function mm_show_post_sitemap()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'title'
    );

    $posts = get_posts($args);
    $output = '<ul class="mm-sitemap-posts">';

    foreach ($posts as $post) {
        $output .= sprintf(
            '<li><a href="%1$s">%2$s</a></li>',
            esc_url(get_permalink($post->ID)),
            esc_html(get_the_title($post->ID))
        );
    }

    $output .= '</ul>';
    return $output; // Mengembalikan daftar posting dalam bentuk list HTML.
}

/**
 * Fungsi untuk menampilkan daftar kategori dalam sitemap.
 * @return string
 */
function mm_show_category_sitemap()
{
    $categories = get_categories(array(
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    $output = '<ul class="mm-sitemap-categories">';

    foreach ($categories as $category) {
        $output .= sprintf(
            '<li><a href="%1$s">%2$s</a></li>',
            esc_url(get_category_link($category->term_id)),
            esc_html($category->name)
        );
    }

    $output .= '</ul>';
    return $output; // Mengembalikan daftar kategori dalam bentuk list HTML.
}

/**
 * Fungsi untuk menampilkan daftar tag dalam sitemap.
 * @return string
 */
function mm_show_tag_sitemap()
{
    $tags = get_tags(array(
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    $output = '<ul class="mm-sitemap-tags">';

    foreach ($tags as $tag) {
        $output .= sprintf(
            '<li><a href="%1$s">%2$s</a></li>',
            esc_url(get_tag_link($tag->term_id)),
            esc_html($tag->name)
        );
    }

    $output .= '</ul>';
    return $output; // Mengembalikan daftar tag dalam bentuk list HTML.
}

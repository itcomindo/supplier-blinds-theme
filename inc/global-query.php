<?php

/**
 *  Global Query
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

?>
<section id="prod" class="section row">
    <div class="container">
        <div id="prod-wr">
            <div id="prod-top">
                <h2 id="prod-setion-head" class="section-head-big">Produk</h2>
                <span class="lw75-mw100 text-center">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
            </div>
            <div id="prod-item-wr">
                <?php mm_show_produk_display(); ?>
            </div>
        </div>
    </div>
</section>


<?php


function mm_show_produk_display()
{
    $exclude_cats = array();

    // Daftar slug kategori yang akan dikecualikan.
    $excluded_slugs = array('supplier', 'blog');

    // Dapatkan ID dari setiap kategori berdasarkan slug.
    foreach ($excluded_slugs as $slug) {
        $kategori = get_term_by('slug', $slug, 'category');
        if ($kategori && !is_wp_error($kategori)) {
            $exclude_cats[] = $kategori->term_id;
        }
    }

    // Buat argumen untuk WP_Query
    if (is_category()) {
        //get current category name
        $current_category = single_cat_title("", false);

        $args = array(
            'posts_per_page' => 10,  // Tampilkan 10 post per halaman.
            'orderby' => 'rand',  // Urutkan secara acak.
            'category_name' => $current_category
        );
    } elseif (is_search()) {
        $args = array(
            'posts_per_page' => 10,  // Tampilkan 10 post per halaman.
            'orderby' => 'rand',  // Urutkan secara acak.
            's' => get_search_query()
        );
    } else {
        $args = array(
            'posts_per_page' => 10,  // Tampilkan 10 post per halaman.
            'orderby' => 'rand',  // Urutkan secara acak.
        );
    }

    // Jika ada kategori untuk dikecualikan, tambahkan ke argumen.
    if (!empty($exclude_cats)) {
        $args['category__not_in'] = $exclude_cats;  // Kecualikan kategori ini.
    }

    // Lakukan query.
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
?>
            <div class="prod-item">
                <?php
                mm_show_cb_global_discount();
                ?>
                <div class="prod-item-top">
                    <a href="<?php the_permalink(); ?>" title="Nama Produk">
                        <?php echo the_post_thumbnail('full', ['alt' => get_the_title(), 'title' => get_the_title()]) ?>
                    </a>
                    <span class="prod-author"><?php echo esc_html(get_the_author_meta('user_login')); ?></span>
                </div>
                <div class="prod-bot">
                    <?php get_template_part('inc/components/five-stars'); ?>
                    <h3 class="prod-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_html(get_the_title()); ?>" rel="bookmark"><?php echo esc_html(get_the_title()); ?></a></h3>
                    <span class="prod-excerpt"><?php echo esc_html(get_the_title()); ?> dapat dipesan disini.</span>
                    <a href="<?php the_permalink(); ?>" class="prod-detail" rel="bookmark" title="<?php echo esc_html(get_the_title()); ?>"><i class="fas fa-arrow-right"></i> Lihat Detail Produk</a>


                </div>


            </div>
<?php
        }
    }
    wp_reset_postdata();
}

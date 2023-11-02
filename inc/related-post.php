<?php

/**
 * Related Post
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
if (is_single() && !has_category('Supplier')) {
    //get post author
    $post_author = get_post_field('post_author', get_the_ID());
    $supplier_cat_id = get_cat_ID('Supplier');
    $args = [
        'author' => $post_author, // Penulis post.
        'post__not_in' => array(get_the_ID()), // Mengecualikan post saat ini.
        'posts_per_page' => 10, // Jumlah maksimum posts per halaman.
        'orderby' => 'date', // Mengurutkan berdasarkan tanggal.
        'category__not_in' => array($supplier_cat_id), // Mengecualikan kategori 'Supplier'.
    ];
    $query = new WP_Query($args);
?>
    <div id="prod-item-wr">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <div class="prod-item">
                    <?php
                    ?>
                    <div class="prod-item-top">
                        <a href="<?php the_permalink(); ?>" title="Nama Produk">
                            <img class="find-this" src="<?php echo mm_custom_featured_image(); ?>" title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
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
        ?>
    </div>
<?php
}

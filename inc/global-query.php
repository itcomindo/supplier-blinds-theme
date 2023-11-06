<?php

/**
 *  Global Query
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
$domain_name = $_SERVER['HTTP_HOST'];
?>
<section id="prod" class="section row">
    <div class="container">
        <div id="prod-wr">
            <div id="prod-top">
                <?php
                if (is_home() || is_front_page()) {
                ?>
                    <h2 id="prod-setion-head" class="section-head-big">Produk</h2>
                    <span class="lw75-mw100 text-center">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
                <?php
                } elseif (is_category()) {
                    $category_name = single_cat_title("", false);
                    $title = 'Jual Produk ' . single_cat_title('', false) . ' Terbaik Berkualitas Harga Murah';
                    $description = 'Jual Produk ' . single_cat_title('', false) . ' Terbaik Berkulaitas Harga Termurah di ' . $domain_name . ' - Supplier Blinds (Distributor Tirai Window Blinds)';
                ?>
                    <div id="prod-head-custom-wr">
                        <h1 id="prod-setion-head-custom" class="section-head-big"><?php echo esc_html($title); ?></h1>
                        <span class="text-left"><?php echo $description; ?></span>
                        <div id="prod-seo-wr">
                            <h2 id="prod-setion-subhead-custom"><?php echo esc_html($category_name); ?></h2>
                            <p><?php echo esc_html($category_name); ?> merupakan produk unggulan yang terbuat dari bahan material berkualitas tinggi. Setiap pembelian <?php echo esc_html($category_name); ?> disini mendapatkan kelebihan yang menarik.</p>
                            <p>Kami merupakan supplier <?php echo esc_html($category_name); ?> di Indonesia siap untuk bekerjasama mengirim dan memasang produk <?php echo esc_html($category_name); ?> di kota Anda.</p>
                        </div>
                    </div>
                <?php
                } elseif (is_search()) {
                    $head = esc_html(get_search_query()); // Mengambil query pencarian.
                    $head = preg_replace('/[^a-zA-Z0-9]/', '', $head); // Menghapus karakter yang bukan huruf dan angka.
                ?>
                    <h1 id="prod-setion-head-custom" class="section-head-big">Produk <?php echo esc_html($head) ?></h1>
                    <span class="lw75-mw100 text-center">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
                <?php
                } elseif (is_author()) {
                    $author = get_queried_object();
                    $author_id = $author->ID;
                    $author_login_name = get_the_author_meta('user_login', $author_id);
                    $title = 'Supplier Distributor Roller Horizontal Vertical Blinds ' . $author_login_name;
                    $description = $title . 'Supplier Distributor Agen Toko Jual Window Blinds di ' . get_the_author_meta('display_name');
                ?>
                    <h1 id="prod-setion-head-custom" class="section-head-big"><?php echo esc_html($title); ?></h1>
                    <span class="lw75-mw100 text-center">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
                <?php
                }
                ?>
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
    } elseif (is_author()) {
        $author = get_queried_object();
        $author_id = $author->ID;
        $args = array(
            'posts_per_page' => 10,  // Tampilkan 10 post per halaman.
            'orderby' => 'rand',  // Urutkan secara acak.
            'author' => $author_id
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
}

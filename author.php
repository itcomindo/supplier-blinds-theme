<?php

/**
 * File author.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;
get_header();

?>
<section id="aut" class="section">
    <div class="container">
        <div id="prod-wr">

            <div id="prod-top">

                <?php
                $author = get_queried_object();
                $author_id = $author->ID;
                $author_login_name = get_the_author_meta('user_login', $author_id);
                $title = 'Supplier Distributor Roller Horizontal Vertical Blinds ' . $author_login_name;
                $description = $title . 'Supplier Distributor Agen Toko Jual Window Blinds di ' . get_the_author_meta('display_name');
                ?>
                <h1 id="prod-setion-head-custom" class="section-head-big"><?php echo esc_html($title); ?></h1>
                <span class="lw75-mw100 text-center">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
            </div>

            <div id="aut-bot" data-author="<?php echo $author_login_name; ?>">
                <?php
                mm_show_all_post_category_for_author();
                ?>
                <ul id="aut-bot-list-wr">
                    <?php mm_show_post_by_author(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();

function mm_show_all_post_category_for_author()
{
    // Mendapatkan semua kategori tanpa memeriksa jumlah post.
    $categories = get_terms(array(
        'taxonomy'   => 'category',
        'hide_empty' => false,
    ));

    // Mendefinisikan slug kategori yang akan dikecualikan.
    $exclude_slugs = array('supplier', 'uncategorized');

    // Memastikan kita memiliki kategori sebelum mencetaknya.
    if (!empty($categories) && !is_wp_error($categories)) {
        echo '<ul id="aut-cat-top">'; // Membuka tag ul.

        // Mencetak setiap kategori.
        foreach ($categories as $category) {
            // Menyaring kategori yang tidak diinginkan berdasarkan slug.
            if (!in_array($category->slug, $exclude_slugs)) {
                // Mendapatkan link ke arsip kategori.
                $category_link = get_category_link($category->term_id);

                // Menampilkan list item dengan link dan nama kategori.
                echo '<li data-cat="' . esc_attr($category->slug) . '"><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></li>'; // Mencetak elemen li dengan link kategori.
            }
        }

        echo '</ul>'; // Menutup tag ul.
    }
}



function mm_show_post_by_author()
{
    $supplier_category_id = get_cat_ID('Supplier');

    // Pastikan ID kategori didapatkan.
    if (!$supplier_category_id) {
        return; // ID kategori 'Supplier' tidak ditemukan.
    }
    $args = ([
        'post_type' => 'post',
        'author' => get_queried_object()->ID,
        'category__not_in' => array($supplier_category_id), // Kecualikan kategori 'Supplier'.
        'posts_per_page' => -1,
    ]);
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $cat = get_the_category();
            $cat = $cat[0];
            $cat_name = $cat->slug;
?>
            <li class="aut-filter" data-cat="<?php echo $cat_name; ?>"><?php echo the_title(); ?></li>
<?php
        }
    }
}

?>

<script>
    jQuery(function() {
        // Mengambil teks yang akan difilter berdasarkan data-author pada #aut-bot.
        var authorToFilter = jQuery.trim(jQuery('#aut-bot').data('author').toString());

        // Mengiterasi setiap li dengan kelas 'aut-filter'.
        jQuery('#aut-bot-list-wr .aut-filter').each(function() {
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
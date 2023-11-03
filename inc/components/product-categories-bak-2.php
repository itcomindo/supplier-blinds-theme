<?php

/**
 * Product Categories
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
function mm_show_category_menu($the_id = 'fpc')
{
    // Dapatkan ID dari kategori yang akan dikecualikan.
    $to_exclude = array('Supplier', 'Uncategorized', 'Produk');
    $exclude_ids = array();
    // Membuat list kategori yang dikecualikan.
    foreach ($to_exclude as $cat_name) {
        $term = get_term_by('name', $cat_name, 'category');
        if ($term) {
            $exclude_ids[] = $term->term_id;
        }
    }
    // Dapatkan semua kategori kecuali yang dikecualikan.
    $categories = get_categories(array(
        'exclude' => $exclude_ids,
        'hide_empty' => false
    ));
    // Array untuk urutan kategori.
    $custom_order = array(
        "Roller Blinds" => 1,
        "Vertical Blinds" => 2,
        "Horizontal Blinds" => 3,
        "Wooden Blinds" => 4,
        "Zebra Blinds" => 5,
        "Motorized Blinds" => 6,
        "Outdoor Blinds" => 7,
        "PVC Blinds" => 8,
        "Tirai Blinds" => 9,
    );
    // Mengurutkan kategori.
    usort($categories, function ($a, $b) use ($custom_order) {
        $a_order = isset($custom_order[$a->name]) ? $custom_order[$a->name] : 9999; // Angka besar untuk kategori yang tidak terdaftar
        $b_order = isset($custom_order[$b->name]) ? $custom_order[$b->name] : 9999;
        return $a_order <=> $b_order;
    });
?>
    <div id="<?php echo esc_html($the_id); ?>" class="h100">
        <div id="fpc-wr" class="h100">
            <div id="fpc-close" class="hide">X</div>
            <div id="fpc-choise-head">
                <div id="fpc-by-cat" class="fpc-trigger" data-tab="bycat">Kategori</div>
                <div id="fpc-by-city" class="fpc-trigger active" data-tab="bycity">Kota</div>
            </div>
            <div id="fpc-choise-content">
                <div id="fpc-by-cat-content" data-tab="bycat" class="fpc-tab-content hide">
                    <h3 id="fpc-head" class="hide">Berdasarkan Kategori:</h3>
                    <nav id="fpc-nav">
                        <ul id="fpc-item-wr">
                            <?php
                            foreach ($categories as $category) {
                                echo '<li class="fpc-item"><a class="fpc-item-link" href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_html($category->name) . '">' . esc_html($category->name) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div id="fpc-by-city-content" data-tab="bycity" class="fpc-tab-content show">
                    <h3 id="fpc-head" class="hide">Berdasarkan Kota:</h3>
                    <?php mm_show_author_page();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

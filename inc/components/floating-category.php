<?php

/**
 * Product Categories
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
function mm_show_floating_category()
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
    <div id="flocat" class="h100">
        <div id="flocat-wr" class="h100">
            <div id="flocat-close" class="hide">X</div>
            <div id="flocat-choise-head">
                <div id="flocat-by-cat" class="flocat-trigger" data-tab="bycat">Kategori</div>
                <div id="flocat-by-city" class="flocat-trigger active" data-tab="bycity">Kota</div>
            </div>
            <div id="flocat-choise-content">
                <div id="flocat-by-cat-content" data-tab="bycat" class="flocat-tab-content hide">
                    <h3 id="flocat-head" class="hide">Berdasarkan Kategori:</h3>
                    <nav id="flocat-nav">
                        <ul id="flocat-item-wr">
                            <?php
                            foreach ($categories as $category) {
                                echo '<li class="flocat-item"><a class="flocat-item-link" href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_html($category->name) . '">' . esc_html($category->name) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div id="flocat-by-city-content" data-tab="bycity" class="flocat-tab-content show">
                    <h3 id="flocat-head" class="hide">Berdasarkan Kota:</h3>
                    <?php mm_show_author_page();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}






function mm_show_author_page()
{
    //get all user that have role Administrator then show for each user as ul li a to their profile page.
    $args = array(
        'role' => 'Administrator',
        'orderby' => 'user_nicename',
        'order' => 'ASC'
    );
    $users = get_users($args);
    echo '<ul id="flocat-user-item-wr">';
    foreach ($users as $user) {
        echo '<li class="flocat-user-item"><a href="' . get_author_posts_url($user->ID) . '">' . $user->display_name . '</a></li>';
    }
    echo '</ul>';
}

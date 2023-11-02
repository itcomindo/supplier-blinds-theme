<?php

/**
 *  Footer Menu
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

if (is_home() || is_front_page() || is_category()) {
    mm_show_global_discount('banner', 'fm-banner');
} elseif (is_single() && !has_category('Supplier')) {
    mm_show_cb_global_discount('arc-global-discount footer animate__animated animate__bounceInDown animate__delay-1s');
}
?>

<?php
if (is_home() || is_front_page()) {
?>
    <div id="fm-berlaku">
        <small>Berlaku di kota-kota tertentu</small>
    </div>
<?php
} elseif (is_single()) {
?>
    <div id="fm-berlaku">
        <small>Berlaku di <?php mm_show_post_author_login('string'); ?> dan sekitarnya</small>
    </div>
<?php
}
?>


<div id="fm">
    <div id="fm-wr">
        <ul id="fm-item-wr">
            <li class="fm-item"><a href="/#about"><i class="fa-solid fa-city"></i><span class="fm-item-text">About</span></a></li>
            <li class="fm-item prod-menu-trigger"><i class="fa-solid fa-cart-flatbed-suitcase"></i><span class="fm-item-text">Produk</span></li>
            <li class="fm-item search-modal-trigger"><i class="fa-solid fa-magnifying-glass"></i><span class="fm-item-text">Search</span></li>
            <li class="fm-item fcont-trigger "><i class="fab fa-whatsapp"></i><span class="fm-item-text">Contact</span></li>
        </ul>
    </div>
</div>
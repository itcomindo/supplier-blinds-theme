<?php

/**
 * Contact Modal
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


function mm_show_all_user_cb_user_phone()
{
    $users = get_users(array(
        'orderby' => 'display_name',
        'order' => 'ASC'
    ));
?>
    <div id="fcontact-wr">
        <div id="fcontact-close">X</div>
        <div id="fcontact-item-wr">
            <h3 class="fcontact-head color-accent-1">Customer Service</h3>
            <small>Tekan tombol nama kota dibawah ini yang related dengan lokasi terdekat Anda. Atau <a class="color-accent-1" href="<?php mm_show_cta('whatsapp'); ?>">Tekan Disini untuk menghubungi toko pusat kami.</a></small>
            <ul class="fcontact-list-item-wr">
                <?php
                foreach ($users as $user) {
                    $name = $user->user_login;
                    $phone = carbon_get_user_meta($user->ID, 'cb_user_phone');
                    $phone = substr_replace($phone, '62', 0, 1);
                    $phone = str_replace('-', '', $phone);
                    $phone = str_replace(' ', '', $phone);
                ?>
                    <li class="fcontact-item <?php echo $name; ?>"><a class="fcontact-item-link" href="//api.whatsapp.com/send?phone=<?php echo esc_html($phone); ?>&text=Hallo%20Supplier%20Blinds%20<?php echo esc_html($name); ?>"><span><?php echo esc_html($name); ?></span></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
<?php
}


function mm_show_user_phone_by_city()
{
    $pass = array('span');
?>
    <div id="fcontact-wr" class="fcontbycity">
        <div id="fcontact-close">X</div>
        <div id="fcontact-item-wr">
            <div id="fcontact-head-wr">
                <div id="fcontact-img-wr">
                    <img class="cs-image" src="<?php echo get_template_directory_uri() . '/assets/images/cs-female.webp'; ?>" alt="Customer Services">
                </div>
                <h3 class="fcontact-head color-accent-1">Customer Service <?php echo wp_kses(mm_show_post_author_login('string'), mah($pass)); ?></h3>
            </div>
            <ul id="fcontact-user-city-list-wr">
                <li class="fcontact-user-city-list wa-bg"><a href="<?php mm_show_cta_by_user('whatsapp'); ?>"><i class="fab fa-whatsapp"></i> Chat Whatsapp</a></li>
                <li class="fcontact-user-city-list call-bg"><a href="<?php mm_show_cta_by_user('phone'); ?>"><i class="fas fa-square-phone"></i> Hubungi Telepon</a></li>
            </ul>
        </div>
    </div>
<?php
}




?>


<div id="fcontact" class="section">

    <?php
    if (is_front_page() || is_home() || is_category()) {
        mm_show_all_user_cb_user_phone();
    } else {
        mm_show_user_phone_by_city();
    }
    ?>


</div>
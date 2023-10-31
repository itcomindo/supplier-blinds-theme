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
<?php
}


?>


<div id="fcontact" class="section">
    <div id="fcontact-wr">
        <div id="fcontact-close">X</div>
        <div id="fcontact-item-wr">
            <h3 class="fcontact-head color-accent-1">Contact</h3>
            <small>Tekan tombol nama kota dibawah ini yang related dengan lokasi terdekat Anda. Atau <a class="color-accent-1" href="<?php mm_show_cta('whatsapp'); ?>">Tekan Disini untuk menghubungi toko pusat kami.</a></small>
            <?php mm_show_all_user_cb_user_phone(); ?>
        </div>
    </div>
</div>
<?php

/**
 * Desktop Whatsapp
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

function mm_show_greeting()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $jam = $date->format('H');
    if ($jam >= 0 && $jam <= 11) {
        echo '<span>Selamat Pagi, silahkan tekan disini untuk chat/telepon kami</span>';
    } elseif ($jam >= 12 && $jam <= 14) {
        echo '<span>Selamat Siang, silahkan tekan disini untuk chat/telepon kami</span>';
    } elseif ($jam >= 15 && $jam <= 18) {
        echo '<span>Selamat Sore, silahkan tekan disini untuk chat/telepon kami</span>';
    } elseif ($jam >= 19 && $jam <= 24) {
        echo '<span>Selamat Malam, silahkan tekan disini untuk chat/telepon kami</span>';
    }
}

?>


<div id="greeting" class="animate__animated animate__backInUp">
    <div id="greeting-cs-image">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/cs-female.webp';  ?>" title="Customer Service" alt="Customer Service">
    </div>
    <?php mm_show_greeting(); ?>
</div>


<div id="dwa">
    <div class="dwa-wr">
        <div id="dwa-close">X</div>
        <div id="dwa-item-wr">
            <?php
            if (is_home() || is_page() || is_front_page() || is_category()) {
            ?>
                <a href="<?php mm_show_kantor_pusat_phone('whatsapp'); ?>" class="dwa-item dwa-wa" rel="noopener" title="customer service"><i class="fab fa-whatsapp"></i> Chat</a>
                <a href="<?php mm_show_kantor_pusat_phone('phone'); ?>" class="dwa-item dwa-call" rel="noopener" title="customer service"><i class="fas fa-phone"></i> Call</a>
            <?php
            } elseif (is_single()) {
            ?>
                <a href="<?php mm_show_cta_by_user('whatsapp'); ?>" class="dwa-item dwa-wa" rel="noopener" title="customer service"><i class="fab fa-whatsapp"></i> Chat</a>
                <a href="<?php mm_show_cta_by_user('phone'); ?>" class="dwa-item dwa-call" rel="noopener" title="customer service"><i class="fas fa-phone"></i> Call</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
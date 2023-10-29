<?php

/**
 * Global Discount Banner Component
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

/**
 * Function mm_show_global_discount
 * @param string $what banner|inloop
 */
function mm_show_global_discount($what, $elclass = '')
{
    if (carbon_get_theme_option('global_discount')) {

        if ('banner' === $what) {
?>
            <div class="global-discount <?php echo esc_html($elclass); ?>">
                <span class="potongan-harga">Potongan Harga Hingga</span>
                <span class="discount-number">
                    <?php echo esc_html(carbon_get_theme_option('global_discount')) . '<sup class="persen">%</sup>' ?>
                </span>
                <span class="berlaku"><sup>*</sup> Berlaku diwilayah tertentu</span>
            </div>
        <?php
        } elseif ('inloop' === $what) {
        ?>
            <div class="global-discount <?php echo esc_html($elclass); ?>">
                <div class="gdinner">
                    <span class="loop-potongan-harga">Disc Up To</span>
                    <span class="loop-discount-number">
                        <?php echo esc_html(carbon_get_theme_option('global_discount')) . '<sup class="loop-persen">%</sup>' ?>
                    </span>
                    <span class="loop-berlaku"><sup>*</sup> Jabodetabek, Bandung, Surabaya</span>
                </div>
            </div>
<?php
        } else {
            echo 'error';
        }
    }
}

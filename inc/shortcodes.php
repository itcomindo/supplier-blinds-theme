<?php

/**
 * Shortcodes
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


function mm_show_shortcode_phone()
{
    if (is_single()) {
        $x = esc_html(carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone'));
        return $x;
    } else {
        $x = esc_html(carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone'));
        return $x;
    }
}
add_shortcode('phone', 'mm_show_shortcode_phone');

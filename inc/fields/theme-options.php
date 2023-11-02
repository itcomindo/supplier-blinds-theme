<?php

/**
 * File theme-options.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 * Function Theme Options
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_theme_options()
{
    Container::make('theme_options', 'Theme Options')
        ->add_fields([
            Field::make('textarea', 'alamat', 'Alamat'),
            Field::make('text', 'phone', 'Phone Number'),
            Field::make('text', 'email', 'Email'),
            Field::make('text', 'global_discount', 'Global Discount'),
            Field::make('text', 'city_global_discount', 'Global Discount Berlaku di Kota'),
        ]);
}
add_action('carbon_fields_register_fields', 'mm_theme_options');


/**
 * Function mm_show_kantor_pusat_phone
 *
 * @param string $what What to show (display, string) Default: display no need echo
 */
function mm_show_kantor_pusat_phone($what = 'display')
{
    if (carbon_get_theme_option('phone')) {
        if ('display' === $what) {
            echo esc_html(carbon_get_theme_option('phone'));
        } elseif ('string' === $what) {
            return esc_html(carbon_get_theme_option('phone'));
        } elseif ('whatsapp' === $what) {
            $x = substr_replace(carbon_get_theme_option('phone'), '62', 0, 1);
            $x = str_replace('-', '', $x);
            $x = str_replace(' ', '', $x);
            $x = '//api.whatsapp.com/send?phone=' . $x;
            echo esc_html($x);
        } elseif ('phone' === $what) {
            $x = substr_replace(carbon_get_theme_option('phone'), '62', 0, 1);
            $x = str_replace('-', '', $x);
            $x = str_replace(' ', '', $x);
            $x = 'tel:+' . $x;
            echo esc_html($x);
        }
    }
}




/**
 * Function mm_show_alamat
 */
function mm_show_alamat($what = 'echo')
{
    if (carbon_get_theme_option('alamat')) {
        if ('echo' === $what) {
            echo esc_html(carbon_get_theme_option('alamat'));
        } else {
            return esc_html(carbon_get_theme_option('alamat'));
        }
    }
}


/**
 * Show Global Discount by City or Individually
 */
function mm_show_city_global_discount()
{
    if (carbon_get_theme_option('global_discount') && carbon_get_theme_option('city_global_discount')) {
        $city = carbon_get_theme_option('city_global_discount');
        echo '<div id="hero-note-wr"><sup>*</sup> Berlaku di ' . $city . '</div>';
    } elseif (carbon_get_theme_option('global_discount') && !carbon_get_theme_option('city_global_discount')) {
        echo '<div id="hero-note-wr"><sup>*</sup> Berlaku untuk wilayah Jabodetabek, Bandung, Jogja, Semarang, Surabaya, Bali, Medan, Makassar.</div>';
    }
}



/**
 * Function Show CTA
 * @param string $what What to show (whatsapp, phone, display)
 */
function mm_show_cta($what)
{
    $phone = carbon_get_theme_option('phone');
    $email = carbon_get_theme_option('email');
    if ($phone) {
        $phone = substr_replace($phone, '62', 0, 1);
        $phone = str_replace('-', '', $phone);

        if (is_single()) {
            $watext = get_the_title();
            $watext = 'Hallo%20Supplier%20Blinds%20Mohon%20Info%20*%20' . str_replace(' ', '%20', $watext) . '%20 *';
        } elseif (is_tag()) {
            $watext = single_tag_title('', false);
            $watext = 'Hallo%20Supplier%20Blinds%20Mohon%20Info%20*%20' . str_replace(' ', '%20', $watext) . '%20 *';
        } else {
            $watext = 'Hallo%20Supplier%20Blinds';
        }

        if ('whatsapp' === $what) {
            $cta = '//api.whatsapp.com/send?phone=' . $phone . '&text=' . $watext;
            echo esc_html($cta);
        } elseif ('phone' === $what) {
            $cta = 'tel:+' . $phone;
            echo esc_html($cta);
        } elseif ('display' === $what) {
            echo esc_html(carbon_get_theme_option('phone'));
        } elseif ('email' === $what && $email) {
            echo 'mailto:' . esc_html($email);
        } elseif ('email' === $what && !$email) {
            echo 'mailto:mail.budiharyono@gmail.com';
        } elseif ('email-display' === $what && !$email) {
            echo 'mail.budiharyono@gmail.com';
        } elseif ('email-display' === $what && $email) {
            echo 'mailto:' . esc_html($email);
        } else {
            echo esc_html(carbon_get_theme_option('phone'));
        }
    } else {
        echo esc_html('No Phone Number');
    }
}

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
            Field::make('text', 'phone', 'Phone Number'),
            Field::make('text', 'email', 'Email'),
            Field::make('text', 'global_discount', 'Global Discount'),
            Field::make('text', 'city_global_discount', 'Global Discount Berlaku di Kota'),


            Field::make('separator', 'globaldiscountsep', 'Global Discount By Kota')
                ->set_classes('cb-separator'),


            Field::make('complex', 'discount_by_kota', 'Global Discount by Kota')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'gdisc_city', 'Kota'),
                    Field::make('text', 'gdisc_discount', 'Discount'),
                ]),


            Field::make('separator', 'csbycitysep', 'Customer Service By Kota')
                ->set_classes('cb-separator'),
            Field::make('complex', 'cs_by_city', 'CS By Kota')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'cs_city', 'Kota'),
                    Field::make('text', 'cs_city_phone', 'Phone'),
                ]),

        ]);
}
add_action('carbon_fields_register_fields', 'mm_theme_options');





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

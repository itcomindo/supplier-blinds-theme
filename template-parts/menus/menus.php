<?php
/**
 * File menus.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;
/**
 * Function mm_register_menus
 *
 * Description: Header Menu, Category Menu, Footer Menu
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_register_menus()
{
    register_nav_menus([
        'header-menu' => 'Header Menu',
        'category-menu' => 'Category Menu',
        'footer-menu' => 'Footer Menu'
    ]);
}
add_action('after_setup_theme', 'mm_register_menus');
add_action('after_setup_theme', 'mm_register_menus');
/**
 * Function mm_show_header_menu
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_show_header_menu()
{
    wp_nav_menu([
        'theme_location' => 'header-menu',
        'container' => 'nav',
        'container_id' => 'header-menu',
        'container_class' => 'header-menu',
        'menu_id' => 'header-menu-item-wr',
        'menu_class' => 'horizontal-menu',
    ]);
}
/**
 * Function mm_show_category_menu
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_show_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'container' => 'nav',
        'container_id' => 'category-menu',
        'container_class' => 'category-menu',
        'menu_id' => 'category-menu-item-wr',
        'menu_class' => 'horizontal-menu',
    ]);
}
/**
 * Function mm_show_footer_menu
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_show_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'container' => 'nav',
        'container_id' => 'footer-menu',
        'container_class' => 'footer-menu',
        'menu_id' => 'footer-menu-item-wr',
        'menu_class' => 'vertical-menu',
    ]);
}

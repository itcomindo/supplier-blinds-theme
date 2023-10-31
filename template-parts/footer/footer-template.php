<?php

/**
 * File footer-template.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

get_template_part('inc/components/contact-modal');
mm_show_category_menu('fpc-home');
get_template_part('template-parts/footer/footer-menu');

// if (is_home() || is_front_page()) {
// }

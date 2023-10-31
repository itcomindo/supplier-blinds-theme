<?php

/**
 * File singular.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

get_header();


if (is_single()) {
    // get_template_part('template-parts/contents/single-content');
} elseif (is_page()) {
    // get_template_part('template-parts/contents/page-content');
}

get_footer();

<?php

/**
 * Archive.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

get_header();

if (is_tag()) {
    get_template_part('template-parts/archives/tag-archive');
} elseif (is_category()) {
    get_template_part('inc/global-query');
} else {
    echo 'error';
}


get_footer();

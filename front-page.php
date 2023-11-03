<?php

/**
 * Frontpage
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

get_header();
get_template_part('template-parts/sections/hero-section');
get_template_part('template-parts/sections/about-section');
get_template_part('template-parts/sections/rekanan-section');
get_template_part('template-parts/sections/cta-section');
get_template_part('template-parts/sections/testimonials-section');
get_template_part('inc/global-query');
get_footer();

<?php

/**
 * Search Template
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;
get_header();
get_template_part('inc/global-query');
get_footer();


?>
<script>
    jQuery(function() {
        setTimeout(function() {
            jQuery('#help').addClass('active');
            jQuery('#help-close, #help').on('click', function() {
                jQuery('#help').removeClass('active');
            });
        }, 3000);
    });
</script>
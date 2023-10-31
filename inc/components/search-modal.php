<?php

/**
 * Search Modal
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

?>


<div id="search-modal" class="section">
    <div id="search-modal-wr">
        <div id="search-modal-close">X</div>
        <div id="search-modal-form">
            <form id="sm-form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input type="text" name="s" id="search-modal-input" placeholder="Search">
                <button type="submit" id="search-modal-submit"><i class="fas fa-magnifying-glass"></i>Search
                </button>
            </form>
        </div>
    </div>
</div>
<?php

/**
 * Single Content
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;
if (is_single()) {
    $posid = get_the_ID();
    $pcname = get_the_category($posid)[0]->name;
}
?>
<section id="arc" class="section">
    <div class="container">
        <div id="single-content-wr">
            <div id="arc-wr" class="supplier">
                <div id="arc-left" class="arc-col">
                    <h1 id="arc-head">
                        <?php echo get_the_title(); ?>
                    </h1>
                    <?php
                    if ('Supplier' === $pcname) {
                    ?>
                        <span>Nomor Telepon Supplier/Agen/Distributor Blinds <?php echo get_the_author_meta('user_login', get_post_field('post_author', $posid)); ?> <?php echo mm_show_cta_by_user('display'); ?>. Harga tirai blinds disini lebih terjangkau (murah) dan kualitas terbaik.</span>
                    <?php
                    } else {
                    ?>
                        <span>Beli tirai roller, vertical, horizontal, wooden, zebra indoor dan outdoor blinds disini jaminan harga terbaik dari kami.</span>
                    <?php
                    }
                    ?>
                    <div id="arc-cta-item-wr">
                        <a href="<?php mm_show_cta_by_user('whatsapp') ?>" id="arc-cta-wa" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo get_the_title(); ?>"><i class="fab fa-whatsapp"></i> Chat Whatsapp</a>
                        <a href="<?php mm_show_cta_by_user('phone') ?>" id="arc-cta-call" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo get_the_title(); ?>"><i class="fas fa-phone"></i> Telepon Kami</a>
                    </div>
                </div>
                <div id="arc-right" class="arc-col">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', array('title' => 'Photo ' . get_the_title(), 'class' => 'arc-fim', 'alt' => 'Photo ' . get_the_title()));
                    } else {
                    ?>
                        <img class="arc-fim find-this" src="<?php echo esc_html(mm_custom_featured_image()); ?>" alt="<?php echo esc_html(get_the_title()); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
<section id="arc-content" class="section">
    <div class="container">
        <div id="arc-content-wr" class="supplier">
            <?php mm_show_cb_global_discount(); ?>
            <div id="the-content">
                <h2 id="the-content-head" class="section-head-medium"><?php echo esc_html(get_the_title()); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
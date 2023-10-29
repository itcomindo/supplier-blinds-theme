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
                    Hubungi Nomor Telepon <?php echo mm_show_cta_by_user('display') . ' | ' . substr(get_the_title() . ' ' . get_the_excerpt(), 0, 160); ?>
                    <div id="arc-cta-item-wr">
                        <a href="<?php mm_show_cta_by_user('whatsapp') ?>" id="arc-cta-wa" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo get_the_title(); ?>"><i class="fab fa-whatsapp"></i> Chat Whatsapp</a>
                        <a href="<?php mm_show_cta_by_user('phone') ?>" id="arc-cta-call" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo get_the_title(); ?>"><i class="fas fa-phone"></i> Telepon Kami</a>
                    </div>
                </div>
                <div id="arc-right" class="arc-col">
                    <?php the_post_thumbnail('full', array('title' => get_the_title(), 'class' => 'arc-fim', 'alt' => get_the_title())); ?>
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
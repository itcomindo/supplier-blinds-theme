<?php

/**
 * Tag Archive
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

?>
<section id="arc" class="section">
    <div class="container">
        <?php mm_show_tag_content(); ?>
    </div>
</section>




<?php

if ('Supplier' === get_the_category(get_the_ID())[0]->cat_name) {
?>
    <section id="arc-content" class="section">
        <div class="container">
            <div id="arc-content-wr" class="supplier">
                <?php mm_show_cb_global_discount(); ?>
                <div id="the-content">
                    <h2 id="the-content-head" class="section-head-medium">Info Harga, Penawaran <?php echo esc_html(single_tag_title('', false)); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
?>
    <section id="arc-content" class="section">
        <div class="container">
            <div id="arc-content-wr" class="supplier">
                <?php mm_show_cb_global_discount(); ?>
                <div id="the-content">
                    <h2 id="the-content-head" class="section-head-medium">Info Harga, Penawaran <?php echo esc_html(single_tag_title('', false)); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php
}




function mm_show_tag_content()
{

    if (is_tag()) {

        if ('Supplier' === get_the_category(get_the_ID())[0]->cat_name) {
            mm_tag_with_category_supplier();
        } else {
            mm_tag_with_category_supplier();
            // mm_tag_with_category_non_supplier();
        }
    }
}



function mm_tag_with_category_supplier()
{
?>
    <div id="arc-wr" class="supplier">
        <div id="arc-left" class="arc-col">
            <h1 id="arc-head">
                <?php echo esc_html(single_tag_title('', false)); ?>
            </h1>
            <?php echo substr(esc_html(single_tag_title('', false)) . ' ' . get_the_excerpt(), 0, 160); ?>
            <div id="arc-cta-item-wr">
                <a href="<?php mm_show_cta_by_user('whatsapp') ?>" id="arc-cta-wa" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo esc_html(single_tag_title('', false)); ?>"><i class="fab fa-whatsapp"></i> Chat Whatsapp</a>
                <a href="<?php mm_show_cta_by_user('phone') ?>" id="arc-cta-wa" class="arc-cta-item" title="Nomor Telepon Whatsapp <?php echo esc_html(single_tag_title('', false)); ?>"><i class="fas fa-phone"></i> Telepon Kami</a>
            </div>
        </div>
        <div id="arc-right" class="arc-col">
            <?php the_post_thumbnail('full', array('title' => esc_html(single_tag_title('', false)), 'class' => 'arc-fim', 'alt' => esc_html(single_tag_title('', false)))); ?>
        </div>
    </div>
<?php
}



function mm_tag_with_category_non_supplier()
{
?>
    <div id="arc-wr" class="produk">
        <h1>Produk</h1>
    </div>
<?php
}

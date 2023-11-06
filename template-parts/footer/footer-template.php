<?php

/**
 * File footer-template.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;


?>
<footer id="foo" class="section row">
    <div class="container">
        <div id="foo-wr">
            <div id="foo-top" class="foo col">
                <h2 id="foo-head" class="section-head color-accent-1">Supplier Window Blinds</h2>
                <span id="foo-tagline" class="lw75-mw100">Supplier Distributor interior design: tirai gorden roller blinds, horizontal blinds, vertical blinds, wooden blinds, zebra blinds, PVC blinds, motorized blinds (indoor & outdoor) & gorden rumah sakit anti noda dan bakteri.</span>
                <span id="foo-alamat"><?php mm_show_alamat(); ?></span>
                <span id="foo-phone-pusat"><i class="fab fa-whatsapp"></i> <i class="fas fa-phone"></i><?php mm_show_kantor_pusat_phone('display'); ?></span>
            </div>


            <div id="foo-bot">
                <div id="foo-left" class="foo-col">
                    <h3 class="foo-head section-subhead">About Us</h3>
                    <span><?php echo esc_html($_SERVER['HTTP_HOST']) ?> merupakan UMKM yang bergerak dalam usaha penyediaan kebutuhan interior design seperti: window blinds dan gorden rumah sakit di Indonesia.</span>
                    <span>Kami memiliki staff dan rekanan yang siap untuk memberikan informasi produk, jasa pengukuran dan instalasi dari produk yang Anda beli melalui kami.</span>
                </div>
                <div id="foo-mid" class="foo-col">
                    <h3 class="foo-head section-subhead">Produk Kategory</h3>
                    <small>Pilih produk berdasarkan kategori produk tersedia:</small>
                    <?php mm_show_category_menu('foo-cat'); ?>
                </div>
                <div id="foo-right" class="foo-col">
                    <h3 class="foo-head section-subhead">Toko Cabang & Perwakilan</h3>
                    <small>Toko cabang dan perwakilan kami tersedia di kota-kota besar di Indonesia seperti:</small>
                    <?php
                    mm_user_login_name('foo-user-list');
                    ?>
                </div>
            </div>



        </div>
    </div>
</footer>
<div id="cp" class="section">
    <div class="container">
        <div id="cp-wr">
            <span>Copyright <?php echo esc_html(date('Y')); ?> <?php echo esc_html($_SERVER['HTTP_HOST']) ?> Web Desing by Budiharyono.com</span>
        </div>
    </div>
</div>
<?php



get_template_part('inc/components/contact-modal');
get_template_part('inc/components/desktop-whatsapp');
// mm_show_category_menu('fpc-home');
mm_show_floating_category();
get_template_part('template-parts/footer/footer-menu');
get_template_part('inc/components/search-modal');
get_template_part('inc/components/help');

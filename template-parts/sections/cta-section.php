<?php

/**
 * File cta-section.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */

defined('ABSPATH') || exit;

?>

<div id="cta" class="section row">
    <div class="cta-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container">
        <div id="cta-wr" class="pad-y-5">
            <div id="cta-top">
                <h3 id="cta-head" class="section-head">Let's Get in Touch</h3>
                <span class="font-display font-display-text">Hubungi kami dengan Chat Whatsapp, Telepon atau Email:</span>
            </div>
            <div id="cta-bot">
                <div id="cta-item-wr">
                    <div class="cta-item">
                        <i class="fab fa-whatsapp"></i>
                        <h3 class="cta-item-head">Chat Whatsapp</h3>
                        <span class="cta-item-text">Butuh roller blinds vertical blinds horizontal dan lainnya? mari chat dengan kami.</span>
                        <a href="<?php mm_show_cta('whatsapp'); ?>" class="cta-item-link cta-button">Chat Whatsapp</a>
                    </div>

                    <div class="cta-item">
                        <i class="fas fa-phone"></i>
                        <h3 class="cta-item-head">Telepon Kami</h3>
                        <span class="cta-item-text">Butuh wooden blinds zebra blinds PVC dan lainnya? hubungi nomor telepon kami.</span>
                        <a href="<?php mm_show_cta('phone'); ?>" class="cta-item-link cta-button">Call Us</a>
                    </div>

                    <div class="cta-item">
                        <i class="far fa-envelope"></i>
                        <h3 class="cta-item-head">Kirim Email</h3>
                        <span class="cta-item-text">Ingin proposal, penawaran pricelist produk interior design? kirim email saja.</span>
                        <a href="<?php mm_show_cta('email'); ?>" class="cta-item-link cta-button">Send an Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

/**
 * File cta-section.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */

defined('ABSPATH') || exit;

?>

<div id="cta" class="section row">
    <div class="container">
        <div id="cta-wr">
            <div id="cta-top">
                <h3 id="cta-head" class="section-head">Let's Get in Touch</h3>
                <span class="font-display font-display-text">Hubungi kami dengan Chat Whatsapp, Telepon atau Email:</span>
            </div>
            <div id="cta-bot">
                <div id="cta-item-wr">
                    <div class="cta-item">
                        <i class="fab fa-whatsapp"></i>
                        <h3 class="cta-item-head">Chat Whatsapp</h3>
                        <span class="cta-item-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, eum doloribus.</span>
                        <a href="<?php mm_show_cta('whatsapp'); ?>" class="cta-item-link cta-button">Chat Whatsapp</a>
                    </div>

                    <div class="cta-item">
                        <i class="fas fa-phone"></i>
                        <h3 class="cta-item-head">Telepon Kami</h3>
                        <span class="cta-item-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, eum doloribus.</span>
                        <a href="<?php mm_show_cta('phone'); ?>" class="cta-item-link cta-button">Call Us</a>
                    </div>

                    <div class="cta-item">
                        <i class="far fa-envelope"></i>
                        <h3 class="cta-item-head">Kirim Email</h3>
                        <span class="cta-item-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, eum doloribus.</span>
                        <a href="<?php mm_show_cta('email'); ?>" class="cta-item-link cta-button">Send an Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
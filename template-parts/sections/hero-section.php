<?php

/**
 * File hero-section.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;

?>

<section id="hero" class="section">
    <div class="container">
        <div id="hero-wr">
            <i id="b"><svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentcolor" d="M51,-60.4C64.1,-49.9,71.1,-31.8,73.1,-13.9C75.1,4.1,72.1,22,64.6,39.7C57.2,57.4,45.5,75,30.8,77.1C16.1,79.2,-1.5,65.8,-14.6,54.7C-27.7,43.6,-36.3,34.8,-46.3,23.7C-56.3,12.6,-67.7,-0.7,-70.4,-17.1C-73,-33.5,-66.9,-53,-53.7,-63.5C-40.6,-74.1,-20.3,-75.6,-0.6,-74.9C19,-74.1,38,-71,51,-60.4Z" transform="translate(100 100)" />
                </svg></i>
            <?php
            mm_show_global_discount('banner', 'hero-global-discount');
            ?>
            <div id="hero-left" class="hero-col">
                <h1 id="hero-primary-header">Supplier Tirai Gorden Blinds</h1>
                <h2 id="hero-secondary-header">Horizontal, Vertical, Roller, Wooden Blinds</h2>
                <span id="hero-desc">Menjual produk Window Blinds seperti: Horizontal, Vertical, Wooden, Roller, Electric, Motorized, Transparant Blinds keseluruh Indonesia dengan harga grosir dan eceran.</span>
                <span id="hero-phone"><i class="fas fa-phone"></i> 0813-9891-2341</span>
            </div>
            <div id="hero-right" class="hero-col">
                <span id="hero-list-head">Beli Window Blinds disini:</span>
                <ul id="hero-list-item-wr">
                    <li class="hero-list-item">Produk Berkualitas</li>
                    <li class="hero-list-item">Gratis Survey</li>
                    <li class="hero-list-item">Gratis Pengukuran</li>
                    <li class="hero-list-item">Gratis Pengiriman</li>
                    <li class="hero-list-item">Gratis Pemasangan</li>
                    <li class="hero-list-item">Bergaransi</li>
                </ul>
                <?php
                mm_show_city_global_discount();
                ?>
            </div>
        </div>
    </div>
</section>
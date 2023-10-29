<?php

/**
 *  Global Query
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

$x = 25;
?>
<section id="prod" class="section row">
    <div class="container">
        <div id="prod-wr">
            <div id="prod-top">
                <h2 id="prod-setion-head" class="section-head-big">Produk</h2>
                <span class="lw75-mw100 text-left">Hanya menjual produk-produk Window Blinds (Roller, Horizontal, Vertical, Wooden, Zebra blind) terbaik, berkualitas dengan harga terjangkau</span>
            </div>
            <div id="prod-item-wr">

                <?php
                for ($y = 10; $y < $x; $y++) {
                ?>
                    <div class="prod-item">
                        <?php
                        echo mm_show_global_discount('inloop', 'prod-global-discount');
                        ?>
                        <div class="prod-item-top">
                            <a href="/roller-blinds/7/roller-blinds-terbaik-harga-termurah/" title="Nama Produk">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/sample.webp'; ?>" alt="Nama Produk" title="nama produk">
                            </a>
                        </div>

                        <div class="prod-bot">
                            <h3 class="prod-title"><a href="/roller-blinds/7/roller-blinds-terbaik-harga-termurah/" title="nama produk" rel="bookmark">Nama Produk</a></h3>
                            <span class="prod-excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                            <a href="/roller-blinds/7/roller-blinds-terbaik-harga-termurah/" class="prod-detail" rel="bookmark" title="Detail Produk"><i class="fas fa-arrow-right"></i> Lihat Detail Produk</a>


                        </div>



                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
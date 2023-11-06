<?php

/**
 * Help
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


if (is_search()) {
    $head = esc_html(get_search_query()); // Mengambil query pencarian.
    $head = preg_replace('/[^a-zA-Z0-9]/', '', $head); // Menghapus karakter yang bukan huruf dan angka.

?>
    <div id="help">
        <div id="help-wr">
            <div id="help-image-wr">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/cs-female.webp' ?>" alt="Customer Service" title="Customer Service">
            </div>
            <h3 id="help-head">Kami ada disini</h3>
            <p><span class="tebal">Sedang mencari <?php echo $head; ?></span>? Kami sangat menghargai waktu Anda, yuk berbicara dengan chat Whatsapp atau telepon. Tekan tombol dibawah ini ya.</p>
            <div id="help-close">X</div>
        </div>
    </div>
<?php
}

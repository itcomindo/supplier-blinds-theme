<?php

/**
 * Rekanan Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

function mm_ambil_gambar_rekanan()
{
    // Direktori target.
    $dir = WP_CONTENT_DIR . '/uploads/rekanan/*.webp';

    // Mengambil semua file .webp dari direktori target.
    $files = glob($dir);

    $output = ''; // Output string untuk menyimpan hasil

    // Jika ada file yang ditemukan.
    if (!empty($files)) {
        if (mm_is_devmode()) {
            $x = 6;
            for ($y = 0; $y < $x; $y++) {
                $file_url = content_url('/uploads/rekanan/' . basename($files[$y]));
                $output .= '<div class="rekanan-item">';
                $output .= '<img class="rekanan-img" src="' . esc_url($file_url) . '" alt="client perusahaan outsourcing PT. FMG ke ' . $x . ' " title="client perusahaan outsourcing PT. FMG ke ' . $x . ' ">';
                $output .= '</div>';
            }
        } else {
            $x = 0;
            foreach ($files as $file) {
                $x++;
                $file_url = content_url('/uploads/rekanan/' . basename($file));
                $output .= '<div class="rekanan-item">';
                $output .= '<img class="rekanan-img" src="' . esc_url($file_url) . '" alt="client perusahaan outsourcing PT. FMG ke ' . $x . ' " title="client perusahaan outsourcing PT. FMG ke ' . $x . ' ">';
                $output .= '</div>';
            }
        }
    }

    return $output;
}

// Untuk menampilkan gambar-gambar tersebut, Anda bisa memanggil:.
// echo mm_ambil_gambar_rekanan();.


?>

<div id="rekanan" class="section row">
    <div class="container">
        <div id="rekanan-wr">
            <div id="rekanan-top">
                <h3 class="section-head-medium">Produk Kami Telah Terpasang di:</h3>
                <span id="rekanan-text" class="font-display font-display-text">Produk kami telah terpasang di:</span>
            </div>
            <div id="rekanan-item-wr">
                <?php echo mm_ambil_gambar_rekanan(); ?>
            </div>
        </div>
    </div>
</div>
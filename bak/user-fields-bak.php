<?php

/**
 * ACF Fields from User Profile
 *
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mm_cb_user_fields()
{
    Container::make('user_meta', 'Data User')
        ->add_fields([
            Field::make('text', 'cb_user_phone', 'Phone'),
            Field::make('text', 'cb_global_discount', 'Global Discount')
        ]);
}
add_action('carbon_fields_register_fields', 'mm_cb_user_fields');
/**
 * mm_show_cb_global_discount
 * @param string $elclass class of the element
 */
function mm_show_cb_global_discount($elclass  = "arc-global-discount")
{
    // $x = carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount');
    if (carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount')) {
        if (is_single()) {
            $global_discount = carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount');
            echo '<div class="' . $elclass . '"><span class="arc-disc-text">Disc Up to</span><div class="arc-disc-number">' . esc_html($global_discount) . '<sup>%</sup></div><span>' . mm_show_post_author_login() . '<span></div>';
        } elseif (is_tag()) {
            $tag_id = get_queried_object()->term_id;
            $post_id = get_posts(array(
                'numberposts' => 1,
                'tag_id' => $tag_id,
                'post_type' => 'post',
                'fields' => 'ids'
            ));
            $post_id = $post_id[0];
            $author_id = get_post_field('post_author', $post_id);
            $global_discount = carbon_get_user_meta($author_id, 'cb_global_discount');
            echo '<div class="' . $elclass . '"><span class="arc-disc-text">Disc Up to</span><div class="arc-disc-number">' . esc_html($global_discount) . '<sup>%</sup></div>' . mm_show_post_author_login() . '</div>';
        } else {
            $global_discount = '<div class="global-discount prod-global-discount"><div class="gdinner"><span class="loop-potongan-harga">Disc Up To</span><span class="loop-discount-number">' . carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount') . '<sup class="loop-persen">%</sup></span><span class="khusus">' . (get_the_author_meta('user_login')) . ' & sekitarnya</span></div></div>';
            echo $global_discount;
        }
    }
}

/**
 * mm_show_post_author_first_name
 * @param string $what what to show (display, string, string-return)
 */
function mm_show_post_author_login($what = 'display')
{
    $author_id = get_post_field('post_author', get_the_ID());
    $author_login = get_the_author_meta('user_login', $author_id);
    if ('display' === $what) {
        $author_login = '<span class="arc-khusus-kota"><span>Khusus </span><span>' . $author_login . '</span></span>';
        return $author_login;
    } elseif ('string' === $what) {
        echo esc_html($author_login);
    } elseif ('string-return' === $what) {
        return esc_html($author_login);
    }
}
/**
 * Function mm_show_cta_by_user
 * Description: Show CTA by user
 * @param string $what what to show (whatsapp, phone, display)
 */
/**
 * Menampilkan CTA berdasarkan pengguna.
 *
 * @param string $what Tipe CTA yang akan ditampilkan.
 */
function mm_show_cta_by_user($what = 'display')
{
    // Pastikan kita dalam loop the_post atau is_single, is_tag, atau is_author.
    if (!in_the_loop() && !is_single() && !is_tag() && !is_author()) {
        return;
    }

    // Dapatkan ID pengguna dan judul pos.
    $post_id = get_the_ID();
    $author_id = get_post_field('post_author', $post_id);
    $title = get_the_title($post_id);
    $text_message = urlencode($title);
    $user_phone = carbon_get_user_meta($author_id, 'cb_user_phone');

    // Format nomor telepon untuk penggunaan internasional.
    $user_phone = substr_replace($user_phone, '62', 0, 1);
    $user_phone = str_replace(['-', ' '], '', $user_phone);

    // Cek konteks halaman dan tentukan URL yang sesuai.
    switch ($what) {
        case 'whatsapp':
            $whatsapp_url = "//api.whatsapp.com/send?phone=" . esc_html($user_phone) . "&text=Hallo%20Supplier%20Blinds%20Mohon%20Info%20*%20" . $text_message . "%20*";
            echo esc_url($whatsapp_url);
            break;

        case 'phone':
            $tel_url = "tel:+" . esc_html($user_phone);
            echo esc_url($tel_url);
            break;

        default:
            echo esc_html($user_phone); // Tampilkan nomor telepon.
            break;
    }
}


/**
 * Function mm_user_login_name
 * Description: Show all user login name
 * @param string $the_id id of the ul
 */
function mm_user_login_name($the_id = 'user-list')
{
    $users = get_users(array('role' => 'administrator'));
    echo '<ul id="' . esc_html($the_id) . '">';
    foreach ($users as $user) {
?>
        <li class="<?php echo esc_html($user->user_login); ?>"><?php echo esc_html($user->user_login); ?></li>
<?php
    }
    echo '</ul>';
}
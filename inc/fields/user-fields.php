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
 */
function mm_show_cb_global_discount()
{

    // $x = carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount');
    if (carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount')) {
        if (is_single()) {
            $global_discount = carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_global_discount');
            echo '<div class="arc-global-discount"><span class="arc-disc-text">Disc Up to</span><div class="arc-disc-number">' . esc_html($global_discount) . '<sup>%</sup></div><span>' . mm_show_post_author_login() . '<span></div>';
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
            echo '<div class="arc-global-discount"><span class="arc-disc-text">Disc Up to</span><div class="arc-disc-number">' . esc_html($global_discount) . '<sup>%</sup></div>' . mm_show_post_author_login() . '</div>';
        } else {
            $text_message = 'Hallo%20Supplier%20Blinds';
        }
    }
}



/**
 * mm_show_post_author_first_name
 */
function mm_show_post_author_login()
{
    $author_id = get_post_field('post_author', get_the_ID());
    $author_login = get_the_author_meta('user_login', $author_id);
    $author_login = '<span class="arc-khusus-kota"><span>Khusus Kota  </span><span>' . $author_login . '</span></span>';
    return $author_login;
}





/**
 * Function mm_show_cta_by_user
 */
function mm_show_cta_by_user($what = 'display')
{
    $x = carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone');
    if (is_single()) {
        if ('whatsapp' === $what) {
            $text_message = str_replace(' ', '%20', get_the_title());
            $user_phone = substr_replace(carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone'), '62', 0, 1);
            $user_phone = str_replace('-', '', $user_phone);
            $user_phone = str_replace(' ', '', $user_phone);
            echo '//api.whatsapp.com/send?phone=' . esc_html($user_phone) . '&text=Hallo%20Supplier%20Blinds%20Mohon%20Info%20*%20' . esc_html($text_message) . '%20 *';
        } elseif ('phone' === $what) {
            $text_message = str_replace(' ', '%20', get_the_title());
            $user_phone = substr_replace(carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone'), '62', 0, 1);
            $user_phone = str_replace('-', '', $user_phone);
            $user_phone = str_replace(' ', '', $user_phone);
            echo 'tel:+' . esc_html($user_phone);
        } else {
            echo esc_html(carbon_get_user_meta(get_post_field('post_author', get_the_ID()), 'cb_user_phone'));
        }
    } elseif (is_tag()) {
        $text_message = str_replace(' ', '%20', single_tag_title('', false));
        $tag_id = get_queried_object()->term_id;
        $post_id = get_posts(array(
            'numberposts' => 1,
            'tag_id' => $tag_id,
            'post_type' => 'post',
            'fields' => 'ids'
        ));
        $post_id = $post_id[0];
        $author_id = get_post_field('post_author', $post_id);

        if ('whatsapp' === $what) {
            $user_phone = carbon_get_user_meta($author_id, 'cb_user_phone');
            $user_phone = substr_replace($user_phone, '62', 0, 1);
            $user_phone = str_replace('-', '', $user_phone);
            $user_phone = str_replace(' ', '', $user_phone);
            echo '//api.whatsapp.com/send?phone=' . esc_html($user_phone) . '&text=Hallo%20Supplier%20Blinds%20Mohon%20Info%20*%20' . esc_html($text_message) . '%20 *';
        } elseif ('phone' === $what) {
            $user_phone = carbon_get_user_meta($author_id, 'cb_user_phone');
            $user_phone = substr_replace($user_phone, '62', 0, 1);
            $user_phone = str_replace('-', '', $user_phone);
            $user_phone = str_replace(' ', '', $user_phone);
            echo 'tel:+' . esc_html($user_phone);
        } elseif ('display' === $what) {
            echo esc_html(carbon_get_user_meta($author_id, 'cb_user_phone'));
        }
    } else {
        $text_message = 'Hallo%20Supplier%20Blinds';
    }
}




function mm_show_all_user_cb_user_phone()
{
    $users = get_users(array(
        'orderby' => 'display_name',
        'order' => 'ASC'
    ));
    foreach ($users as $user) {
        $name = $user->user_login;
        $phone = carbon_get_user_meta($user->ID, 'cb_user_phone');
        $phone = substr_replace($phone, '62', 0, 1);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace(' ', '', $phone);
?>
        <div class="fcontact-item <?php echo $name; ?>">
            <span class="fcontact-item-name"><?php echo esc_html($name); ?></span>
            <a class="fcontact-item-link" href="<?php echo esc_html($phone); ?>"><i class="fab fa-whatsapp"></i> Chat Cabang <?php echo esc_html($name); ?></a>
        </div>
<?php
    }
}

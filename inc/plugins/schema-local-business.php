<?php

/**
 * Schema.org LocalBusiness
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


function mm_local_business_post_supplier()
{
    $image_1 = get_template_directory_uri() . '/assets/images/sample.webp';


    if (is_single() && has_category('Supplier')) {
        $title = get_the_title();
        $alamat = get_field('alamat');
        $kota = get_field('city');
        $provinsi = get_field('provinsi');
        $kodepos = get_field('kodepos');
        $image_2 = get_the_post_thumbnail_url();
    } elseif (is_tag() && has_category('Supplier')) {
        $title = single_tag_title('', false);
        $alamat = mm_acf_post_alamat()['alamat'];
        $kota = mm_acf_post_alamat()['kota'];
        $provinsi = mm_acf_post_alamat()['provinsi'];
        $kodepos = mm_acf_post_alamat()['kodepos'];
    }
?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "image": [
                "<?php echo $image_2; ?>",
                "<?php echo $image_1; ?>"
            ],
            "name": "<?php echo $title; ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo $alamat; ?>",
                "addressLocality": "<?php echo $kota; ?>",
                "addressRegion": "<?php echo $provinsi; ?>",
                "postalCode": "<?php echo $kodepos; ?>",
                "addressCountry": "ID"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4.9",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "Lillian Ruiz"
                }
            },
            "url": "<?php echo get_permalink(); ?>",
            "telephone": "<?php echo mm_show_cta_by_user('display'); ?>",
            "priceRange": "$",
            "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday"
                    ],
                    "opens": "07:30",
                    "closes": "19:00"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Wednesday",
                        "Thursday",
                        "Friday"
                    ],
                    "opens": "10:30",
                    "closes": "19:00"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "Saturday",
                    "opens": "13:00",
                    "closes": "18:00"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "Sunday",
                    "opens": "13:00",
                    "closes": "18:00"
                }
            ]
        }
    </script>
<?php
}

add_action('wp_head', 'mm_local_business_post_supplier');

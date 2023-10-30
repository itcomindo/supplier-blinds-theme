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
        $reviewer = mm_nama_reviewer();
        //=========================Schema Markup Single Supplier Start=========================
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
                        "name": "<?php echo $reviewer; ?>"
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
        //=========================Schema Markup Single Supllier End =========================
    } elseif (is_tag() && has_category('Supplier')) {
        $title = single_tag_title('', false);
        $alamat = mm_acf_post_alamat()['alamat'];
        $kota = mm_acf_post_alamat()['kota'];
        $provinsi = mm_acf_post_alamat()['provinsi'];
        $kodepos = mm_acf_post_alamat()['kodepos'];
        $reviewer = mm_nama_reviewer();
        $image_2 = mm_get_featured_image_url_of_post_in_tag();
        $tag = get_queried_object();
        $tag_link = get_tag_link($tag->term_id);

        //=========================Schema Markup Tag Supplier Start=========================
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
                        "name": "<?php echo $reviewer; ?>"
                    }
                },
                "url": "<?php echo $tag_link; ?>",
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
        //=========================Tag Supplier End=========================
    } elseif (is_single() && !has_category('Supplier')) {
        $title = get_the_title();
        $alamat = get_field('alamat');
        $kota = get_field('city');
        $provinsi = get_field('provinsi');
        $kodepos = get_field('kodepos');
        $image_2 = get_the_post_thumbnail_url();
        $description = get_the_excerpt();
        $reviewer = mm_nama_reviewer();
        //=========================Schema Produk Start=========================
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?php echo esc_html($title); ?>",
                "image": [
                    "<?php echo esc_html($image_2); ?>",
                    "<?php echo esc_html($image_1); ?>"
                ],
                "description": "<?php echo esc_html($description); ?>",
                "sku": "<?php echo get_the_ID(); ?>",
                "mpn": "<?php echo get_the_ID(); ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "Sharp Point"
                },
                "review": {
                    "@type": "Review",
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": 4.9,
                        "bestRating": 5
                    },
                    "author": {
                        "@type": "Person",
                        "name": "<?php echo esc_html($reviewer); ?>"
                    }
                },
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": 4.9,
                    "reviewCount": <?php echo get_the_ID(); ?>
                },
                "offers": {
                    "@type": "AggregateOffer",
                    "offerCount": 5,
                    "lowPrice": 25000,
                    "highPrice": 250000,
                    "priceCurrency": "IDR"
                }
            }
        </script>
    <?php
        //=========================Schema Produk End=========================

    } elseif (is_tag() && !has_category('Supplier')) {
        $title = single_tag_title('', false);
        $alamat = mm_acf_post_alamat()['alamat'];
        $kota = mm_acf_post_alamat()['kota'];
        $provinsi = mm_acf_post_alamat()['provinsi'];
        $kodepos = mm_acf_post_alamat()['kodepos'];
        $image_2 = mm_get_featured_image_url_of_post_in_tag();
        $description = get_the_excerpt();
        $reviewer = mm_nama_reviewer();
        $tag = get_queried_object();
        $tag_link = get_tag_link($tag->term_id);
        //=========================Schema Markup Tag Produk Start=========================
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?php echo esc_html($title); ?>",
                "image": [
                    "<?php echo esc_html($image_2); ?>",
                    "<?php echo esc_html($image_1); ?>"
                ],
                "description": "<?php echo esc_html($description); ?>",
                "sku": "<?php echo get_the_ID(); ?>",
                "mpn": "<?php echo get_the_ID(); ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "Sharp Point"
                },
                "review": {
                    "@type": "Review",
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": 4.9,
                        "bestRating": 5
                    },
                    "author": {
                        "@type": "Person",
                        "name": "<?php echo esc_html($reviewer); ?>"
                    }
                },
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": 4.9,
                    "reviewCount": <?php echo get_the_ID(); ?>
                },
                "offers": {
                    "@type": "AggregateOffer",
                    "offerCount": 5,
                    "lowPrice": 25000,
                    "highPrice": 250000,
                    "priceCurrency": "IDR"
                }
            }
        </script>
<?php
        //=========================Tag Produk End=========================

    } else {
        //do nothing
        return;
    }
}

add_action('wp_head', 'mm_local_business_post_supplier');














/**
 * =========================
 * Fungsi untuk menghasilkan nama acak dari array nama pria dan wanita Indonesia.
 * =========================
 */
function mm_nama_reviewer()
{
    // Daftar nama pria
    $maleNames = ["Ahmad", "Budi", "Candra", "Dedi", "Eko", "Fajar", "Guntur", "Heru", "Iwan", "Joko"];

    // Daftar nama wanita
    $femaleNames = ["Ani", "Bunga", "Citra", "Dina", "Eka", "Fitri", "Gita", "Hana", "Indah", "Juwita"];

    // Menggabungkan kedua array .
    $allNames = array_merge($maleNames, $femaleNames);

    // Mengacak array dan memilih satu nama secara acak .
    $randomName = $allNames[array_rand($allNames)];

    return $randomName;
}


function mm_get_featured_image_url_of_post_in_tag()
{
    $post_id = get_the_ID();
    $post_thumbnail_id = get_post_thumbnail_id($post_id);
    $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
    return $post_thumbnail_url;
}

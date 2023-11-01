<?php

/**
 * Breadcrumbs
 */

defined('ABSPATH') || exit;
function mm_breadcrumbs()
{

    // blog url
    $home = get_bloginfo('url');
    if (is_single()) {
        // get post category
        $categories = get_the_category();
        $category_name = $categories[0]->cat_name;
        $category_link = get_category_link($categories[0]->cat_ID);
        //=========================Single Breadcrumb=========================
?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_html($home); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo esc_html($category_name); ?>",
                    "item": "<?php echo esc_html($category_link); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo get_the_title(); ?>"
                }]
            }
        </script>
    <?php
    } elseif (is_tag()) {
        $tag = get_queried_object();
        $tag_name = $tag->name;
        $tag_link = get_tag_link($tag->term_id);
        //=========================Tag Breadcrumb=========================
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_html($home); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo esc_html($tag_name); ?>",
                    "item": "<?php echo esc_html($tag_link); ?>"
                }]
            }
        </script>
    <?php
    } elseif (is_category()) {
        $category = get_queried_object();
        $category_name = $category->name;
        $category_link = get_category_link($category->term_id);
        //=========================Category Breadcrumb=========================
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_html($home); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo esc_html($category_name); ?>",
                    "item": "<?php echo esc_html($category_link); ?>"
                }]
            }
        </script>
    <?php
    } elseif (is_page()) {
        //=========================Page Breadcrumb=========================
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_html($home); ?>"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo get_the_title(); ?>"
                }]
            }
        </script>
<?php
    }
}
add_action('wp_head', 'mm_breadcrumbs');

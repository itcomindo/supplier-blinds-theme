<?php

/**
 * Template Name: Search Author Posts
 * Description: Custom search page for author posts by category.
 */

get_header();
// Tangkap parameter dari URL jika ada.
$author_id = isset($_GET['author_id']) ? intval($_GET['author_id']) : null;
$cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : null;
// Tangkap parameter dari URL jika ada.
$author_id = get_query_var('author');
$cat_id = get_query_var('category_name'); // Jika slug kategori, atau 'cat' jika ID.

?>

<section id="sap" class="section">
    <div class="container">
        <h1>test</h1>
        <div id="prod-item-wr">

        </div>
</section>
<?php

get_footer();

<?php get_header();


add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

$myposts = [];
if (have_posts()) :
    while (have_posts()) :
        the_post();
        $myposts[] =
            (object) array_merge(
                (array)$post,
                (array)array("images" => images()),
                (array) array("url" => esc_url(get_permalink())),
                (array) array("post_format" => get_post_format()),
                (array) array('post_excerpt' => get_the_excerpt())
            );
    endwhile;
endif;

$cat = get_category(get_query_var('cat'));
$cat_id = $cat->cat_ID;

?>
<div class="row g-1 flex-row-reverse">
    <div class="col row g-0">
        <div class="col-12 col-lg-9 container">
            <div class="p-3 my-2">
                <?php
                the_archive_title('<h2 class="h3">', '</h2>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </div>
            <div class="row g-2 m-sm-2">
                <?php
                foreach ($myposts as $mypost) {
                ?>
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-4">
                        <?php thumbnail($mypost, 'card'); ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php include __DIR__ . "/components/_pagination.php"; ?>
        </div>

        <div class="col-12 col-lg-3">
            <div class="container sticky-top myThumb offsetNav px-2">
                <h3>Categories</h3>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<div class="m-2"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                }
                ?>
                <h3>tags</h3>
                <?php
                $tags = get_tags();
                // print_r($tags);
                foreach ($tags as $tag) {
                    echo '<div class="m-2"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-2">
        <div class="container sticky-top myThumb offsetNav">

            <div class="p-2">
                <?php get_search_form(); ?>
                <?php the_widget('WP_Widget_Archives'); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

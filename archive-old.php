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
else :
endif;
?>
<div class="row g-1 flex-row-reverse">
    <div class="col row g-0">
        <div class="container-lg">
            <div class="my-5">
                <?php
                the_archive_title('<h2 class="h3">', '</h2>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </div>
            <div class="row g-2" data-masonry='{"percentPosition": true }'>
                <?php
                foreach ($myposts as $mypost) {
                ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php thumbnail($mypost, 'feature_'); ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php include __DIR__ . "/components/_pagination.php"; ?>
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

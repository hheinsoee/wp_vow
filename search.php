<?php
get_header();

$myposts = [];
if (have_posts()) :

    while (have_posts()) :
        the_post();
        $myposts[] =
            (object) array_merge(
                (array)$post,
                (array)array("images" => images()),
                (array) array("url" => esc_url(get_permalink())),
                (array) array('post_excerpt' => get_the_excerpt())
            );
    endwhile;
endif;
?>
<div class="container">
    <div class="row g-1">
        <div class="col-12 col-lg-9">
            <div class="">

                <h2 class="h6">search result for <span class="h3"><?php the_search_query(); ?></span></h2>
                <div class="my-2">
                    <?php get_search_form(); ?>
                </div>

                <div>
                    <?php
                    $x = 1;
                    foreach ($myposts as $mypost) {
                    ?>
                        <div class="my-4">
                            <?php thumbnail($mypost); ?>
                        </div>
                    <?php
                        $x += $x;
                    }
                    ?>
                </div>

                <?php include __DIR__ . "/components/_pagination.php"; ?>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="container sticky-top myThumb offsetNav">
                <h3>Categories</h3>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<div class="m-2"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
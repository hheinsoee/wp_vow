<?php
$terms = array_slice(array_reverse(get_most_recent_posts_categories(), true), 0, 3);
$length = count($terms);
?>
<div class="container">
    <div class="row g-2" data-masonry='{"percentPosition": true }'>
        <?php
        foreach ($terms as $term) {
        ?>
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="d-flex mt-5">
                    <h2 class="h4"><?php echo @$term->name; ?></h2>&nbsp;
                    <hr style="flex:1" />
                </div>
                <div>
                    <?php
                    // query_posts('posts_per_page=5');
                    // 	cat (int): use category id.
                    // category_name (string): use category slug (NOT name).
                    // category__and (array): use category id.
                    // category__in (array): use category id.
                    // category__not_in (array): use category id.
                    // 'post_type' => 'type of post goes here'
                    // 'cat'=>0
                    ?>
                    <?php
                    $related = get_posts(
                        array(
                            'category_name' => $term->slug,
                            'numberposts' => 5
                        )
                    );

                    $counter = 0;
                    if ($related) foreach ($related as $post) {
                        setup_postdata($post);
                        $mypost =
                            (object) array_merge(
                                (array)$post,
                                (array)array("images" => images()),
                                (array) array("url" => esc_url(get_permalink())),
                                (array) array("post_format" => get_post_format()),
                                (array) array('post_excerpt' => get_the_excerpt())
                            );
                    ?>
                        <div class="m-2">
                            <?php thumbnail($mypost,  $counter < 1 ? 'card' : "list"); ?>
                        </div>
                    <?php
                        $counter++;
                    }
                    wp_reset_postdata();
                    ?>
                    <div class="m-2">
                        <a href="<?php echo get_category_link($term->term_id); ?>">
                            <i class="fa-solid fa-angles-right"></i> more <?php echo @$term->name; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
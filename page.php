<?php
get_header();

// echo json_encode(array(
// 	"id" => get_the_ID(),
// 	"slug" => $post->post_name,
//     "time" => date("Y-m-d H:i:s", get_post_time('U', true)),
//     "title"=>get_the_title(),
//     "content"=>apply_filters('the_content', $post->post_content),
//     "excerpt" => html_entity_decode(get_the_excerpt(), ENT_QUOTES, 'UTF-8'),
//     "images" => images(),
//     "category" => wp_get_post_terms(get_the_ID(), "category"),
//     "tag" => wp_get_post_terms(get_the_ID(), "post_tag"),
// ));


$post_categories = get_the_category($post_id);
?>
<div class="row g-0 flex-row-reverse">
    <div class="col row g-0">
        <div class="col-12 col-lg-9">
            <div class="container">
                <article class="container" style="max-width: 700px;">
                    <img loading="lazy" src="<?php echo images()['l']; ?>" alt="" style="width:100%" />
                    <div class="p-2 p-md-0">
                        <h2 class="h4 my-5"><?php echo get_the_title(); ?></h2>
                        <div class="my-5 d-block d-sm-flex justify-content-between">
                            <date class="my-1"><?php echo date("Y-m-d H:i:s", get_post_time('U', true)); ?></date>
                            <div>
                                <?php
                                foreach ($post_categories as $c) {
                                    $cat = get_category($c);
                                ?>
                                    <a class="cat_link small" href="<?php echo get_category_link($cat->term_id); ?>">
                                        <?php echo $cat->name; ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php echo $post->post_content; ?>

                    </div>
                </article>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="container sticky-top myThumb offsetNav">
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-2">
        <div class="container sticky-top myThumb offsetNav">

        </div>
    </div>
</div>

<?php
get_footer();

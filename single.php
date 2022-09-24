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
$post_tags = get_the_tags(get_the_ID());
?>
<div class="row g-0 flex-row-reverse">
    <div class="col row g-0">
        <div class="col-12 col-lg-9">
            <div class="container">
                <article class="container" style="max-width: 700px;">
                    <?php
                    if (get_post_format() == 'video' || get_post_format() == 'audio') {

                    ?>
                        <div class="media img bg-dark text-light">
                            <?php
                            if (get_post_meta($post->ID, 'embed', true)) {
                                echo get_post_meta($post->ID, 'embed', true)['embedCode'];
                            } else {
                                echo '';
                            }
                            ?>
                        </div>
                    <?php
                    } else if (images()['m']) {
                    ?>
                        <div style="background-image:url(<?php echo images()['m']; ?>);
                            background-position:center;
                            background-size:cover">
                            <img loading="lazy" src="<?php echo images()['m']; ?>" alt="" style="width:100%;
                                height:35vh;
                                padding:4vh;
                                object-fit:contain;
                                background:rgba(0,0,0,0.5)
                                " data-bs-toggle="modal" data-bs-target="#exampleModal" />

                        </div>
                    <?php
                    } else {
                    }
                    ?>
                    <div style="z-index: 9992;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="fixed-top p-2" style="z-index:9999">
                                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <img loading="lazy" src="<?php echo images()['l']; ?>" alt="" style="height:100%;" />
                            </div>
                        </div>
                    </div>

                    <div class="p-2 p-md-0">
                        <h2 class="h4 my-2"><?php echo get_the_title(); ?></h2>


                        <div class="my-3 d-block d-sm-flex justify-content-between">
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


                        <span class="me-3">
                            <?php edit_post_link(__('<i class="fa-solid fa-pen-to-square"></i>edit'), ''); ?>
                        </span>
                        <a type="button" id="hein_share">
                            <i class="fa fa-share-alt"></i> share
                        </a>
                        <script>
                            const shareData = {
                                title: '<?php echo get_the_title(); ?>',
                                text: '<?php echo wp_trim_words($post->post_excerpt, 30, ' ..more...'); ?>',
                                url: '<?php echo esc_url(get_permalink()); ?>',
                            }

                            const btn = document.getElementById('hein_share');
                            // const resultPara = document.querySelector('.result');

                            // Must be triggered some kind of "user activation"
                            btn.addEventListener('click', async () => {
                                try {
                                    await navigator.share(shareData)
                                    // resultPara.textContent = 'MDN shared successfully'
                                } catch (err) {
                                    // resultPara.textContent = 'Error: ' + err
                                }
                            });
                        </script>
                        <div class="py-3 my-3 mb-5">
                            <?php the_content(); ?>
                            <?php
                            if ($post_tags) {
                            ?>
                                <br />
                                <i>ဆက်စပ်စကားလုံများ :
                                    <span class="text-primary">
                                        <?php
                                        foreach ($post_tags as $t) {
                                            $tag = get_category($t);
                                        ?>
                                            <a class="_tag" href="<?php echo get_category_link($tag->term_id); ?>">#<?php echo $tag->name; ?></a>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </i>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="container sticky-top myThumb offsetNav">
                <div class="py-1">
                    <h2 class="h6 mx-2">ဆက်စပ်အကြောင်းအရာ</h2>
                    <?php
                    foreach ($post_categories as $c) {
                        $cat = get_category($c);
                    ?>
                        <a class="cat_link" href="<?php echo get_category_link($cat->term_id); ?>">
                            <?php echo $cat->name; ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="row g-0">
                    <?php
                    $term_ids = [];
                    foreach ($post_categories as $c) {
                        $cat = get_category($c);
                        $term_ids = $cat->term_id;
                    }
                    $related = get_posts(
                        array(
                            'category__in' => $cat->term_id,
                            'numberposts' => 5,
                            'post__not_in' => array($post->ID)
                        )
                    );
                    if ($related) foreach ($related as $post) {
                        setup_postdata($post);
                        $mypost =
                            (object) array_merge(
                                (array)$post,
                                (array)array("images" => images()),
                                (array) array("url" => esc_url(get_permalink())),
                                (array) array('post_excerpt' => get_the_excerpt())
                            );

                    ?>

                        <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                            <div class="m-2 ">
                                <?php thumbnail($mypost, 'list'); ?>
                            </div>
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
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

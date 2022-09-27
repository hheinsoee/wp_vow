<div>
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
        $recent_videos = get_posts(
            array(
                'post_type' => 'post',
                // 'cat' => '-1',
                'posts_per_page' => 7,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-audio', 'post-format-video'),
                        // 'operator' => 'NOT IN'
                    )
                )
            )
        );

        $recentVideos = [];
        if ($recent_videos) foreach ($recent_videos as $post) {
            setup_postdata($post);
            $recentVideos[] =
                (object) array_merge(
                    (array)$post,
                    (array)array("images" => images()),
                    (array) array("url" => esc_url(get_permalink())),
                    (array) array("post_format" => get_post_format()),
                    (array) array('post_excerpt' => get_the_excerpt())
                );
        }
        wp_reset_postdata();
        if (count($recentVideos) > 0) {
        ?>

            <?php
            if ($recentVideos[0]->images['xl']) {
                $backgroundImage = $recentVideos[0]->images['xl'];
                $backgroundSize = "cover";
            } else {

                $backgroundImage = ''; //get_template_directory_uri() . '/assets/images/vow_watermark.png';
                $backgroundSize = '70vmin';
            }
            ?>
            <div style="       
            background-image:url(<?php echo $backgroundImage; ?>);
            background-size:<?php echo $backgroundSize; ?>;
            background-attachment:fixed;
            background-repeat:no-repeat;
            background-position:center
            ">
                <div style="--bs-bg-opacity: .7;" class="bg-primary text-light">
                    <div style="min-height:70vh;" class="d-flex flex-column justify-content-between container">

                        <div class="my-5 py-5">
                            <h2 style="font-size: 8vmin;"><i class="fa-solid fa-play"></i>&nbsp;Videos</h2>
                            <div class="mt-4">
                                <div class="d-md-flex flex-row-reverse">
                                    <div style="flex:1"><?php thumbnail($recentVideos[0], 'feature_'); ?></div>
                                    <div style="flex:0.1"></div>
                                    <div style="flex:1.4" class="py-2">
                                        <h3 class="h5">
                                            <?php echo $recentVideos[0]->post_title; ?>
                                        </h3>
                                        <date>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?php echo date_format(date_create($recentVideos[0]->post_modified), "d-M Y H:i "); ?>
                                        </date>
                                        <div class="low">
                                            <?php echo wp_trim_words($recentVideos[0]->post_excerpt, 24, ' ..more...'); ?>
                                        </div>
                                        <div class="my-3">
                                            <a type="button" id="share_<?php echo $recentvideos[0]->id; ?>">
                                                <i class="fa fa-share-alt"></i> share
                                            </a>
                                        </div>
                                        <script>
                                            const shareData = {
                                                title: '<?php echo get_the_title(); ?>',
                                                text: '<?php echo wp_trim_words($post->post_excerpt, 30, ' ..more...'); ?>',
                                                url: '<?php echo esc_url(get_permalink()); ?>',
                                            }

                                            const btn = document.getElementById('share_<?php echo $recentvideos[0]->id; ?>');
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
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="my-5 py-5">
                            <h2>other Recents Video </h2>
                            <div class="row g-2" data-masonry='{"percentPosition": true }'>
                                <?php
                                $index = 0;
                                foreach ($recentVideos as $p) {
                                    if ($index !== 0) {
                                ?>
                                        <div class="col-6 col-sm-6 col-lg-4 ">
                                            <?php thumbnail($p, 'feature_'); ?>
                                        </div>
                                <?php
                                    }
                                    $index = $index + 1;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
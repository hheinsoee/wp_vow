<?php
function thumbnail($post, $s = '')
{
    // echo "<pre>";print_r($post);echo "</pre>";
    switch ($s) {

        case 'feature_':
?>
            <a href="<?php echo $post->url; ?>">
                <div class="postThumbnail feature">
                    <div style="position: relative;">
                        <div style="z-index:1;position: absolute;height:100%; width:100%;" class="p-3 d-flex flex-column justify-content-end text-light" id="gradient_<?php echo $post->ID; ?>">
                            <h3 class="h6">
                                <?php echo $post->post_title; ?>
                            </h3>
                            <date>
                                <i class="fa-solid fa-calendar-days"></i>
                                <?php echo date_format(date_create($post->post_modified), "d-M Y H:i "); ?>
                            </date>
                        </div>
                        <div class="media">
                            <div style="z-index:1;position: absolute;height:100%; width:100%;" class="d-flex align-items-center justify-content-center">
                                <div class="big text-light bg-primary p-2 d-flex align-items-center justify-content-center rounded-3" style="width:50px;position:relative;--bs-bg-opacity: .75;">
                                    <?php postFormatStyle($post->post_format ?: 'standard'); ?>
                                </div>
                            </div>
                            <div style="z-index:1;">
                                <div class="d-flex justify-content-between align-items-center px-2 my-1 low">
                                    <img style="height:1.3rem" class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/vow_white.png'; ?>" />
                                    <i class="text-light">
                                        <?php
                                        $term_obj_list = get_the_terms($post->ID, 'vow_type');
                                        echo join(', ', wp_list_pluck($term_obj_list, 'name'));
                                        ?>
                                    </i>
                                </div>
                            </div>

                            <?php
                            if ($post->images['m']) {
                            ?>

                                <img loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['m']; ?>" id="img<?php echo $post->ID; ?>" />
                                <script>
                                    const fac<?php echo $post->ID; ?> = new FastAverageColor();
                                    const container<?php echo $post->ID; ?> = document.querySelector('#gradient_<?php echo $post->ID; ?>');

                                    fac<?php echo $post->ID; ?>.getColorAsync(document.querySelector('#img<?php echo $post->ID; ?>'))
                                        .then(color => {
                                            container<?php echo $post->ID; ?>.style.background = `linear-gradient(transparent, ${color.rgba})`;
                                            // container<?php // echo $post->ID;
                                                        ?>.style.color = color.isDark ? '#fff' : '#000';

                                        })
                                        .catch(e => {
                                            console.log(e);
                                        });
                                </script>
                            <?php
                            } else {
                            ?>
                                <div class="bg-primary img"></div>
                            <?php
                            };
                            ?>
                        </div>


                    </div>
                </div>
            </a>
        <?php
            break;

        case 'feature':
        ?>
            <a href="<?php echo $post->url; ?>">
                <div class="postThumbnail card">

                    <?php
                    if ($post->images['m']) {
                    ?>
                        <div class="media">
                            <img loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['m']; ?>" />
                        </div>
                    <?php
                    };
                    ?>
                    <div class="p-3 d-flex flex-column justify-content-end">
                        <h3 class="h6">
                            <?php echo $post->post_title; ?>
                        </h3>
                        <date>
                            <i class="fa-solid fa-calendar-days"></i>
                            <?php echo date_format(date_create($post->post_modified), "d-M Y H:i "); ?>
                        </date>
                    </div>
                </div>
            </a>
        <?php
            break;
        case 'card_':
        ?>
            <a href="<?php echo $post->url; ?>">
                <div class="d-sm-flex mb-5">
                    <?php
                    if ($post->images['m']) {
                    ?>
                        <div style="position: relative; flex:0.34">
                            <div style="z-index:1;position: absolute;height:100%; width:100%;" class="d-flex align-items-center justify-content-center">
                                <div class="big text-light bg-primary p-2 d-flex align-items-center justify-content-center rounded-3" style="width:50px;position:relative;--bs-bg-opacity: .75;">
                                    <?php postFormatStyle($post->post_format ?: 'standard'); ?>
                                </div>
                            </div>
                            <img loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['m']; ?>" />
                        </div>
                    <?php
                    };
                    ?>
                    <div style="flex:0.02"></div>
                    <div style="flex:0.64">
                        <h3 class="h5 pt-2">
                            <?php echo $post->post_title; ?>
                        </h3>
                        <date>
                            <i class="fa-solid fa-calendar-days"></i>
                            <?php echo date_format(date_create($post->post_modified), "d-M Y H:i "); ?>
                        </date>
                        <div class="low">
                            <?php echo wp_trim_words($post->post_excerpt, 30, '..more...'); ?>
                        </div>
                    </div>
                </div>
                <hr>
            </a>
        <?php
            break;
        case 'card':
        ?>
            <a href="<?php echo $post->url; ?>">
                <div class="postThumbnail">
                    <?php
                    if ($post->images['m']) {
                    ?>
                        <div class="media">
                            <div style="z-index:1;position: absolute;height:100%; width:100%;" class="d-flex align-items-center justify-content-center">
                                <div class="big text-light bg-primary p-2 d-flex align-items-center justify-content-center rounded-3" style="width:50px;position:relative;--bs-bg-opacity: .75;">
                                    <?php postFormatStyle($post->post_format ?: 'standard'); ?>
                                </div>
                            </div>

                            <div style="z-index:1;">
                                <div class="d-flex justify-content-between align-items-center px-2 my-1 low">
                                    <img style="height:1.3rem" class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/vow_white.png'; ?>" />
                                    <i class="text-light">
                                        <?php
                                        $term_obj_list = get_the_terms($post->ID, 'vow_type');
                                        echo join(', ', wp_list_pluck($term_obj_list, 'name'));
                                        ?>
                                    </i>
                                </div>
                            </div>

                            <img loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['m']; ?>" />
                        </div>
                    <?php
                    };
                    ?>
                    <div class="py-2 px-3 px-sm-0">

                        <h3 class="h6">
                            <span>
                                <?php postFormatStyle($post->post_format ?: 'standard'); ?>
                            </span> <?php echo $post->post_title; ?>
                        </h3>
                        <date>
                            <i class="fa-solid fa-calendar-days"></i>
                            <?php echo date_format(date_create($post->post_modified), "d-M Y"); ?>
                        </date>
                        <?php
                        if (!$post->images['m']) {
                        ?>
                            <small class="low">
                                <?php echo wp_trim_words($post->post_excerpt, 10, '..more...'); ?>
                            </small>
                        <?php
                        };
                        ?>
                    </div>
                    <hr />
                </div>
            </a>
        <?php
            break;

        default:
        ?>
            <a href="<?php echo $post->url; ?>">
                <div class="postThumbnail d-flex">
                    <?php
                    if ($post->images['s']) {
                    ?>
                        <div style="position: relative;" class="me-3">
                            <div style="position: absolute;height:70px; width:100%;" class="d-flex align-items-center justify-content-center">
                                <div class="big text-light p-2 d-flex align-items-center justify-content-center" style="width:50px;position:relative;--bs-bg-opacity: .75;">
                                    <?php postFormatStyle($post->post_format ?: 'standard'); ?>
                                </div>
                            </div>
                            <img loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['s']; ?>" style="width:70px;min-height:70px;height:70px;object-fit:cover" />
                        </div>
                    <?php
                    };
                    ?>
                    <div>
                        <h3 class="h6">
                            <?php echo $post->post_title; ?>
                        </h3>
                        <date>
                            <?php echo date_format(date_create($post->post_modified), "d-M Y"); ?>
                        </date>
                        <div class="small low">

                            <?php echo wp_trim_words($post->post_excerpt, 10, '..more...'); ?>
                        </div>
                    </div>
                </div>
                <hr>
            </a>
<?php
            break;
    }
}

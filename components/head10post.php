<?php


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
<pre>
    <?php
    // print_r($data);
    ?>
</pre>
<div class="container-sm">
    <h2 class="d-none">Latest post</h2>
    <div class="row g-2">
        <div class=" col-12 col-md-12 col-lg-12 col-xl-9">
            <div class="row g-2 flex-row-reverse">
                <div class=" col-12 col-sm-6 col-md-8">
                    <?php thumbnail($myposts[0], 'feature_'); ?>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <?php thumbnail($myposts[1],'card'); ?>
                </div>
            </div>
            <hr />
            <div class="row g-2"  data-masonry='{"percentPosition": true }'>
                <?php
                for ($i = 2; $i <= 5; $i++) {
                ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php thumbnail($myposts[$i], 'card'); ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class=" col-12 col-md-12 col-lg-12 col-xl-3 row g-2 p-0 m-0"  data-masonry='{"percentPosition": true }'>
            <?php
            for ($x = 6; $x <= 9; $x++) {
            ?>
                <div class="<?php echo  $x < 7 ? 'col-6':'col-12';?> col-md-4 col-lg-3 col-xl-12">
                    <?php thumbnail($myposts[$x], $x < 7 ? 'card' : "list"); ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
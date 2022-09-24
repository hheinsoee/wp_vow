<?php
$myposts = [];
if (have_posts()) :

    while (have_posts()) :
        the_post();
        $myposts[] =
            (object) array_merge(
                (array) $post,
                (array) array("images" => images()),
                (array) array("url" => esc_url(get_permalink())),
                (array) array("post_format" => get_post_format())
            );
    endwhile;
else :
endif;

?>
<div class="marquee sticky-top offsetNav bg-dark text-light glass">
    <div class="marquee-content">
        <span class="item-collection-1">
            <?php
            foreach ($myposts as $p) {
            ?>
                <a href='<?php echo  $p->url; ?>' title="<?php echo $p->post_excerpt; ?>">
                    <?php postFormatStyle($p->post_format ?: 'standard'); ?> <?php echo $p->post_title; ?>
                </a> &nbsp;-&nbsp;
            <?php
            }
            ?>
        </span>
        <span class="item-collection-2">
            <?php
            foreach ($myposts as $p) {
            ?>
                <a href='<?php echo  $p->url; ?>' title="<?php echo $p->post_excerpt; ?>">
                    <?php postFormatStyle($post->post_format ?: 'standard'); ?> <?php echo $p->post_title; ?>
                </a> &nbsp;-&nbsp;
            <?php
            }
            ?>
        </span>
    </div>
</div>
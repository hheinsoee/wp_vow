<?php
get_header();
?>
<div style="
background-image: url(<?php echo get_template_directory_uri() . "/assets/images/anibg.svg"; ?>);
position:fixed;
top:0;
bottom:0;
left:0;
right:0;
z-index:-1;
display:flex;
justify-content:center;
" class="mapSvg">
    <?php echo file_get_contents(__DIR__ . "/assets/images/world_map_low_resolution.svg"); ?>
    <script>
        var p = document.querySelectorAll("path");
        var l = p.length;
        setInterval(function() {
            var ramN = Math.floor(Math.random() * (l - 0 + 1) + 0);
            var hue = Math.floor(Math.random() * (360 - 0 + 1) + 0);
            p[ramN].style.fill = "hsla(" + hue + ", 50%, 20%, 50%)";
        }, 100);
    </script>
</div>
<?php include_once __DIR__ . "/components/marquee5post.php"; ?>
<div class=" ">
    <center class="p-3 py-5">
        <?php
        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
            <img loading="lazy" style="
					height: 10vmin;
					/* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
					" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
            &nbsp;
        <?php
        }
        ?>
        <div style="line-height: 1vmin;">
            <h1 class=" my-1"><?php echo get_bloginfo('name'); ?></h1>
            <div><?php echo get_bloginfo('description'); ?></div>
        </div>
        <div class="my-4">
            <small><?php echo date('l F j Y'); ?></small>
        </div>
    </center>
    <script>
        document.documentElement.style.setProperty('--bs-body-color', 'var(--dark-invert)');
        document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark)');
        const winH = window.innerHeight;
        window.addEventListener('scroll', function() {
            let scroll_top = window.scrollY;
            let isOver = scroll_top - winH > 0
            if (isOver) {
                document.documentElement.style.setProperty('--bs-body-color', 'var(--dark)');
                document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark-invert)');
                document.querySelector('.mapSvg').style.opacity = 0.2;

            } else {
                document.documentElement.style.setProperty('--bs-body-color', 'var(--dark-invert)');
                document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark)');
                document.querySelector('.mapSvg').style.opacity = 1;
            }
        });
    </script>
    <?php
    include_once __DIR__ . "/components/head10post.php";
    ?><div style="padding:70px 0px" >
        <?php
        include_once __DIR__ . "/components/recentCategoryPost.php";
        ?>
    </div>
    <div style="padding:70px 0px">
        <?php
        include_once __DIR__ . "/components/recentVideos.php";
        ?>
    </div>

    <center style="padding:70px 0px">
        <h3>all categories</h3>
        <div>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<div class="chip mx-1"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
            }
            ?>
        </div>
    </center>

</div>
<?php
get_footer();

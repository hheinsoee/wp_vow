<?php
get_header();
$imgbg = get_template_directory_uri() . '/assets/images/vow_watermark.png';
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
opacity:0.7;
" class="mapSvg">
</div>

<div class=" ">
    <center class="p-3 py-5">

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
        document.querySelector('.mapSvg').style.opacity = 0.7;
        // const winH = window.innerHeight;
        // window.addEventListener('scroll', function() {
        //     let scroll_top = window.scrollY;
        //     let isOver = scroll_top > winH
        //     if (isOver) {
        //         document.documentElement.style.setProperty('--bs-body-color', 'var(--dark)');
        //         document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark-invert)');
        //         document.querySelector('.mapSvg').style.opacity = 0.1;

        //     } else {
        //         document.documentElement.style.setProperty('--bs-body-color', 'var(--dark-invert)');
        //         document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark)');
        //         document.querySelector('.mapSvg').style.opacity = 0.7;
        //     }
        // });
    </script>
    <?php
    include_once __DIR__ . "/components/head10post.php";
    ?><div style="padding:70px 0px">
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

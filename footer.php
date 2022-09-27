<?php include __DIR__ . "/components/weather.php"; ?>
<footer class="p-3 pt-5">
    <div class="container">

        <div class="row py-5">
            <center>
                <a href="/" class="mb-3 text-decoration-none">

                    <?php
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                        <img style="
height: 10vmin;
/* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
max-height: 100px;
min-height: 50px;
" src="<?php echo esc_url($logo[0]); ?>"  alt="<?php echo get_bloginfo('name'); ?>" class="notranslate bi me-2 logo">
                        &nbsp;
                    <?php
                    }
                    ?>
                    <div>
                        <div class="h1 text-light notranslate"><?= get_bloginfo('name'); ?></div>

                        <div>
                            <?php echo  get_bloginfo('description'); ?>
                        </div>
                    </div>
                </a>
                <p class="low notranslate"><?php echo  get_bloginfo('name'); ?> © <?= date("Y"); ?></p>
            </center>
            <hr>
            <div class="col-12 col-sm-6 col-md-4 mb-3 notranslate">

                <ul class="nav flex-column">
                    <?php
                    foreach (hein_menu_array('main') as $m) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link px-0" aria-current="class" href="<?php echo $m->url; ?>">
                                <?php echo $m->title; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-3">

                <ul class="nav flex-column">
                    <?php
                    foreach (hein_menu_array('category') as $m) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link px-0" aria-current="class" href="<?php echo $m->url; ?>">
                                <?php echo $m->title; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>


            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <ul class="nav flex-column">
                    <?php
                    if (hein_menu_array('footer')) {
                        foreach (hein_menu_array('footer') as $m) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link px-0" aria-current="class" href="<?php echo $m->url; ?>">
                                    <?php echo $m->title; ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>

    <center>

        <a target="_blank" class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
            <i class="fa-brands fa-facebook fa-lg"></i>&nbsp;facebook
        </a>
        <a target="_blank" class="mx-1 px-2" href="https://www.youtube.com/channel/<?= myInfo()['youtube_c_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
            <i class="fa-brands fa-youtube fa-lg"></i>&nbsp;youtube
        </a>
    </center>
    <hr>
    <div class="d-flex small flex-column flex-sm-row align-items-center justify-content-between px-4 m-0" style="font-weight: 100;">
        <div>© 2022 <?= bloginfo('name'); ?>. All rights reserved.</div>
        <a href="https://www.heinsoe.com" class="low">
            developed by www.heinsoe.com
        </a>
    </div>
</footer>
<?php
wp_footer();
?>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="<?= get_template_directory_uri() . '/assets/js/footer.js'; ?>"></script>
</body>

</html>
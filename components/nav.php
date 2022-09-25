<!-- NAV -->
<nav class="navbar d-block p-0 m-0 sticky-top" style="z-index: 1050;">
    <nav class="navbar navbar-expand-lg navbar-dark text-light p-0">
        <div class="container-lg">
            <a class="navbar-brand d-flex" href="/ ">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                    <img loading="lazy" class="logo" style="
					height: 28px;
					" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    &nbsp;
                <?php
                } else {
                ?>
                    <h1 class="h4"><?php echo get_bloginfo('name'); ?></h1>
                <?php
                }
                ?>
            </a>
            <div class="d-flex d-lg-none align-items-center">
                <span type="button" class="mx-1 text-light btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <i class="fa-solid fa-magnifying-glass"></i><span class="d-none d-md-inline">&nbsp;Search</span>
                </span>
                <a target="_blank" class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
                    <i class="fa-brands fa-facebook fa-lg"></i><span class="d-none d-md-inline">&nbsp;facebook</span>
                </a>
                <a target="_blank" class="mx-1 px-2" href="https://www.youtube.com/channel/<?= myInfo()['youtube_c_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
                    <i class="fa-brands fa-youtube fa-lg"></i><span class="d-none d-md-inline">&nbsp;youtube</span>
                </a>
                <span type="button" class="mx-1 text-light btn" data-bs-toggle="modal" data-bs-target="#gTranslate">
                    <i class="fa-solid fa-language fa-lg"></i><span class="d-none d-md-inline">&nbsp;Translate</span>
                </span>
                <span class="btn text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-lg"></i>
                </span>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>

                    <?php
                    if (hein_menu_array('main')) foreach (hein_menu_array('main') as $m) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="class" href="<?php echo $m->url; ?>">
                                <?php echo $m->title; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>


            <div class="d-none d-lg-flex align-items-center">
                <span type="button" class="mx-1 text-light btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <i class="fa-solid fa-magnifying-glass"></i><span class="d-none d-md-inline">&nbsp;Search</span>
                </span>
                <a target="_blank" class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
                    <i class="fa-brands fa-facebook fa-lg"></i><span class="d-none d-md-inline">&nbsp;facebook</span>
                </a>
                <a target="_blank" class="mx-1 px-2" href="https://www.youtube.com/channel/<?= myInfo()['youtube_c_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>">
                    <i class="fa-brands fa-youtube fa-lg"></i><span class="d-none d-md-inline">&nbsp;youtube</span>
                </a>
                <span type="button" class="mx-1 text-light btn" data-bs-toggle="modal" data-bs-target="#gTranslate">
                    <i class="fa-solid fa-language fa-lg"></i><span class="d-none d-md-inline">&nbsp;Translate</span>
                </span>
            </div>
        </div>
    </nav>
    <?php include __DIR__ . "/category_menu.php"; ?>
</nav>


<div class="offcanvas bg-dark text-light offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" style="z-index: 9991;">
    <div class="offcanvas-header">
        <div></div>
        <i type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="fa-solid fa-xmark"></i>
    </div>
    <div class="offcanvas-body container">
        <div class="h2" id="offcanvasTopLabel">Search</div>
        <?php get_search_form();
        ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="gTranslate" tabindex="-1" aria-labelledby="gTranslateLabel" aria-hidden="true" style="z-index: 9991;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gTranslateLabel">Translate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en'
                        }, 'google_translate_element');
                    }
                </script>
            </div>
        </div>
    </div>
</div>
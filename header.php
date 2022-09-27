<!DOCTYPE html>
<html lang="<?php echo get_bloginfo("language"); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#1E3946">
    <?php
    wp_head();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <style>
        <?php
        // if (has_custom_logo()) {
        //     $custom_logo_id = get_theme_mod('custom_logo');
        //     $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        //     $imgbg = esc_url($logo[0]);
        // } else {
        $imgbg = get_template_directory_uri() . '/assets/images/vow_watermark.png';
        // }
        ?>body {
            background-image: url(<?php echo $imgbg; ?>);
            background-size: 60vmin;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
        }

        img,
        .img {
            background-color: hsl(var(--bs-primary-h), 20% , 30%);
            background-image: url(<?php echo $imgbg; ?>);
            background-size: 40%;
            background-repeat: no-repeat;
            background-position: center;
        }

        img.logo,
        nav img {
            background-color: transparent;
            background-image: none !important;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . "/components/nav.php"; ?>
    <script>
        console.log("%cDesign and Developed by ", "font-size:20px;color: #09f");
        console.log("%cwww.heinsoe.com", "font-size:30px");
    </script>
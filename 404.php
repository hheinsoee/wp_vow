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
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height:70vh;">
        <div class=" p-5 text-light" style="--bs-bg-opacity: 0.2;">
            <h2 class="h1">404</h2>
            <p>စာမျက်နှာ မတွေ့ရှိပါ</p>
        </div>
    </div>
</div>
<script>
    document.documentElement.style.setProperty('--bs-body-color', 'var(--dark-invert)');
    document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark)');
    document.querySelector('.mapSvg').style.opacity = 1;
</script>
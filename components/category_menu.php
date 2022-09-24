<div class="bg-primary text-light">
    <div class="swiper categorySwiper container-lg px-5">
        <div class="swiper-wrapper">

            <?php
            if (hein_menu_array('category')) foreach (hein_menu_array('category') as $m) {
            ?>
                <span class="swiper-slide p-1" style="display: inline-block;width: fit-content">
                    <a href="<?php echo $m->url; ?>">
                        <?php echo $m->title; ?>
                    </a>
                </span>
            <?php
            }
            ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<script>
    var swiper = new Swiper(".categorySwiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        // pagination: {
        //     el: ".swiper-pagination",
        //     type: "progressbar",
        //     clickable: true,
        // },
        
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
    });
</script>
<?php
function themename_post_formats_setup()
{
    add_theme_support('post-formats', array('video', 'audio'));
}
add_action('after_setup_theme', 'themename_post_formats_setup');

function postFormatStyle($pf)
{
    switch ($pf) {
        case 'video':
?>
            <i class="fa-solid fa-play"></i>
        <?php
            break;

        case 'audio':
        ?>
            <i class="fa-solid fa-volume-high"></i>

        <?php
            break;

        default:
        ?>
            <i class="fa-solid fa-newspaper"></i>
<?php
            break;
    }
}

?>
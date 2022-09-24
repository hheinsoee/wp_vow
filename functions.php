<?php
include __DIR__ . "/functions/menus.php";
include __DIR__ . "/functions/meta.php";
include __DIR__ . "/functions/taxonomy.php";
include __DIR__ . "/functions/seo.php";
include __DIR__ . "/functions/widget.php";
include __DIR__ . "/functions/post_format.php";
include __DIR__ . "/components/_thumbnails.php";
function myInfo()
{
    $json = file_get_contents(get_template_directory_uri() . '/assets/json/info.json');
    $json_data = json_decode($json, true);
    return $json_data;
}

//image sizing
add_theme_support('post-thumbnails');
add_image_size('xs', 70, 70);
add_image_size('s', 200, 200);
add_image_size('m', 400, 400);
add_image_size('l', 800, 800);
add_image_size('xl', 1000, 1000);
function images()
{
    return array(
        "xs" => get_the_post_thumbnail_url(null, 'xs'),
        "s" => get_the_post_thumbnail_url(null, 's'),
        "m" => get_the_post_thumbnail_url(null, 'm'),
        "l" => get_the_post_thumbnail_url(null, 'l'),
        "xl" => get_the_post_thumbnail_url(null, 'xl')
    );
}


function ryf_custom_logo_setup()
{
    $defaults = array(
        'height'               => 400,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'ryf_custom_logo_setup');

//bootstrap start

function wpt_register_css()
{
    $version = wp_get_theme()->get('Version');
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), $version, 'all');
    wp_enqueue_style('bootstrap.min');
    wp_enqueue_style('slider', get_template_directory_uri() . '/assets/css/slider.css');
    wp_register_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), $version, 'all');
    wp_enqueue_style('style');
    // wp_register_style('bs-overwrite', get_template_directory_uri() . '/assets/css/bootstrap-overwrite.css');
    // wp_enqueue_style('bs-overwrite');
}
add_action('wp_enqueue_scripts', 'wpt_register_css');

function wpt_register_js()
{
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
    wp_register_script('color', get_template_directory_uri() . '/assets/js/color.js');
    wp_enqueue_script('color');
    wp_register_script('index', get_template_directory_uri() . '/assets/js/index.js');
    wp_enqueue_script('index');

    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js');
}
add_action('init', 'wpt_register_js');

//bootstrap end


// fontAwesome 
function fontAwesome()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.css', array(), $version, 'all');
    wp_enqueue_style('brands', get_template_directory_uri() . '/assets/fontawesome/css/brands.css', array(), $version, 'all');
    wp_enqueue_style('regular', get_template_directory_uri() . '/assets/fontawesome/css/regular.css', array(), $version, 'all');
    wp_enqueue_style('solid', get_template_directory_uri() . '/assets/fontawesome/css/solid.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'fontAwesome');







//get_most_recent_posts_categories
function get_most_recent_posts()
{
    $args = array(
        'posts_per_page' => 8,
        'orderby'        => 'post_date',
        'post_status'    => 'publish',
        'fields'         => 'ids',
    );

    $query = new WP_Query($args);
    if (!$query->have_posts()) {
        return false;
    }

    wp_reset_postdata();

    return $query->posts;
}
function get_most_recent_posts_categories()
{
    $most_recent_posts = get_most_recent_posts();
    if (!$most_recent_posts) {
        return false;
    }

    $categories = wp_get_object_terms($most_recent_posts, 'category');
    if (!$categories || is_wp_error($categories)) {
        return false;
    }

    return $categories;
}

/**
 * Add iFrame to allowed wp_kses_post tags
 *
 * @param array  $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
 *
 * @return array
 */
function custom_wpkses_post_tags($tags, $context)
{

    if ('post' === $context) {
        $tags['iframe'] = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
        );
    }

    return $tags;
}

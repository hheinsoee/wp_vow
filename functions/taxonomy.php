<?php

function create_vow_type_box()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Post Type', 'taxonomy general name'),
        'singular_name' => _x('Post Type', 'taxonomy singular name'),
        'search_items' =>  __('Search Post Type'),
        'popular_items' => __('Popular Post Type'),
        'all_items' => __('All Post Type'),
        'parent_item' => __('Parent Post Type'),
        'parent_item_colon' => __('Parent Post Type:'),
        'edit_item' => __('Edit Post Type'),
        'update_item' => __('Update Post Type'),
        'add_new_item' => __('Add New Post Type'),
        'new_item_name' => __('New Post Type Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'vow'),
        'public' => true,
        'show_ui' => true,
        'show_option_none'=>true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true
    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('vow_type', 'post', $args);
    flush_rewrite_rules();
}
add_action('init', 'create_vow_type_box', 0);


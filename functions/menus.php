<?php //menu 
register_nav_menus(
    array(
        'main' => __('Main Manu', ''),
        'category' => __('Category', ''),
        'footer' => __('Footer Manu', ''),
    )
);

function hein_menu_array($menu_id)
{
    if (($menu_id) && ($locations = get_nav_menu_locations()) && isset($locations[$menu_id])) {
        $menu = get_term($locations[$menu_id], 'nav_menu');
        return wp_get_nav_menu_items($menu->term_id);
    }
}
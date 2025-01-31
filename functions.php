<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style','hello-elementor-header-footer' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 20 );


/*Hook
function hide_menu_conditional($items, $args) {
    if (!is_user_logged_in()) {
        // Trover l'élément "admin" dans le menu
        foreach ($items as $key => $item) {
            if ($item->title == 'Admin') {
                // Retirer "admin" du menu
                unset($items[$key]);
                break;
            }
        }
    }
return $items;
}
add_filter('wp_nav_menu_objects', 'hide_menu_conditional', 10, 2);
*/ 
add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );

function add_admin_link( $items, $args ) {

    if (is_user_logged_in() && $args->theme_location == 'menu-1') {

        $items .= '<li class="menu-item-235"><a href="'. get_admin_url() .'">Admin</a></li>';

    }

    return $items;

}
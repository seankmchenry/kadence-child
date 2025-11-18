<?php
/**
 * functions.php
 */

/**
 * Theme function files
 */
require get_stylesheet_directory() . '/inc/theme-functions.php';

/**
 * Theme setup files
 */
require get_stylesheet_directory() . '/inc/theme-setup.php';

/**
 * Enqueue parent and child styles
 */
function uap_theme_styles() {
  // Parent theme styles
  wp_enqueue_style( 'kadence-global-css', get_template_directory_uri() . '/assets/css/global.min.css' );
  wp_enqueue_style( 'kadence-header-css', get_template_directory_uri() . '/assets/css/header.min.css' );
  wp_enqueue_style( 'kadence-content-css', get_template_directory_uri() . '/assets/css/content.min.css' );
  wp_enqueue_style( 'kadence-footer-css', get_template_directory_uri() . '/assets/css/footer.min.css' );

  // Child theme styles
  wp_enqueue_style( 'kadence-child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( 'parent-style' ),
    wp_get_theme()->get('Version')
  );
  wp_enqueue_style( 'kadence-child-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', 'uap_theme_styles' );

/**
 * Enqueue admin styles
 */
function uap_theme_admin_styles() {
  wp_enqueue_style( 'kadence-child-admin', get_stylesheet_directory_uri() . '/assets/css/admin.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/admin.css' ) );
}
add_action( 'admin_enqueue_scripts', 'uap_theme_admin_styles' );

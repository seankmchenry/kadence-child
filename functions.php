<?php
/**
 * functions.php
 */

/**
 * Enqueue parent and child stylesheet
 */
// Please note: it's not clear that this is really
// needed anymore now so may be removed momentarily
function uap_theme_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 'kadence-global-css', get_template_directory_uri() . '/assets/css/global.min.css' );
    wp_enqueue_style( 'kadence-header-css', get_template_directory_uri() . '/assets/css/header.min.css' );
    wp_enqueue_style( 'kadence-content-css', get_template_directory_uri() . '/assets/css/content.min.css' );
    wp_enqueue_style( 'kadence-footer-css', get_template_directory_uri() . '/assets/css/footer.min.css' );

    // Enqueue child theme stylesheet
    wp_enqueue_style( 'kadence-child-css',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'uap_theme_enqueue_styles' );

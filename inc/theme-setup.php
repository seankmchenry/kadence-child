<?php
/**
 * theme-setup.php
 */

/**
 * Show page template in header
 */
function uap_show_page_template() {
  if ( !uap_user_is_dev() ) {
    return;
  }
  global $template;
  echo '<pre style="padding: 1em; margin: 0; font-size: 0.875rem; font-family: monospace;">';
  print_r( $template );
  echo '</pre>';
}
// add_action( 'wp_head', 'uap_show_page_template' );


/**
 * Remove custom columns added by Yoast SEO plugin
 *
 * @link https://gist.github.com/amboutwe/18558a7e681e36c6bfe6e4fb647265ce
 */
function uap_remove_yoast_seo_columns( $columns ) {
  // unset( $columns['wpseo-score'] );
  // unset( $columns['wpseo-score-readability'] );
  unset( $columns['wpseo-title'] );
  unset( $columns['wpseo-metadesc'] );
  unset( $columns['wpseo-focuskw']);
  unset( $columns['wpseo-links']);
  unset( $columns['wpseo-linked']);
  // unset( $columns['wpseo-cornerstone']);
  return $columns;
}
// post types
add_filter( 'manage_edit-post_columns', 'uap_remove_yoast_seo_columns', 10, 1 );
add_filter( 'manage_edit-page_columns', 'uap_remove_yoast_seo_columns', 10, 1 );

// custom post types
add_filter( 'manage_edit-hearing_columns', 'uap_remove_yoast_seo_columns', 10, 1 );
add_filter( 'manage_edit-incident_columns', 'uap_remove_yoast_seo_columns', 10, 1 );
add_filter( 'manage_edit-sighting_columns', 'uap_remove_yoast_seo_columns', 10, 1 );
add_filter( 'manage_edit-whistleblower_columns', 'uap_remove_yoast_seo_columns', 10, 1 );

// taxonomies
add_filter( 'manage_edit-category_columns', 'uap_remove_yoast_seo_columns', 10, 1 );
add_filter( 'manage_edit-post_tag_columns', 'uap_remove_yoast_seo_columns', 10, 1 );


/**
 * Add Google Maps API key for ACF
 */
function bc_acf_google_maps_key() {
  if ( get_field( 'google_maps_api_key', 'option' ) ) {
    acf_update_setting( 'google_api_key', get_field( 'google_maps_api_key', 'option' ) );
  }
}
add_action( 'acf/init', 'bc_acf_google_maps_key' );

<?php
/**
 * theme-functions.php
 */

/**
 * Check if we're in a local environment
 *
 * @return boolean
 */
function uap_is_local() {
  $ip_array = array( '::1', '127.0.0.1', '172.17.0.1' );
  $bool = ( in_array( $_SERVER['REMOTE_ADDR'], $ip_array, true ) ) ? true : false;
  return $bool;
}


/**
 * Check if we're a dev account
 *
 * @return boolean
 */
function uap_user_is_dev() {
  $user = wp_get_current_user();
  $this_user = $user->user_login;

  if ( $this_user === 'sean' ) {
    return true;
  } else {
    return false;
  }
}


/**
 * Show page template in header
 */
function uap_show_page_template() {
  if ( !uap_user_is_dev() ) {
    return;
  }

  global $template;
  echo '<pre class="mb0">';
  print_r( $template );
  echo '</pre>';
}
// add_action( 'wp_head', 'uap_show_page_template' );


/**
 * Yoast column cleanup
 */
function uap_hide_yoast_columns( $columns ) {
  unset( $columns['wpseo-score'] );
  unset( $columns['wpseo-score-readability'] );
  unset( $columns['wpseo-title'] );
  unset( $columns['wpseo-metadesc'] );
  unset( $columns['wpseo-focuskw'] );
  unset( $columns['wpseo-links'] );
  unset( $columns['wpseo-linked'] );
  return $columns;
}

function uap_hide_yoast_column_init() {
  // post types
  add_filter( 'manage_page_posts_columns', 'uap_hide_yoast_columns' );
  add_filter( 'manage_post_posts_columns', 'uap_hide_yoast_columns' );

  // taxonomies
  add_filter( 'manage_edit-category_columns', 'uap_hide_yoast_columns' );
  add_filter( 'manage_edit-post_tag_columns', 'uap_hide_yoast_columns' );
}
add_action( 'admin_init', 'uap_hide_yoast_column_init', 99 );

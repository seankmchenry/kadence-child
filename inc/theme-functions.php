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

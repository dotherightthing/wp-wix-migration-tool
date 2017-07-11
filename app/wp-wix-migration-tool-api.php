<?php
/**
 * API requests
 *
 * This file contains PHP.
 *
 * @link        http://dotherightthing.co.nz
 * @since       0.1.0
 *
 * @package     Wp_Wix_Migration_Tool
 * @subpackage  Wp_Wix_Migration_Tool/app
 */

if ( !function_exists( 'wp_wix_migration_tool_get_data' ) ) {

  /**
   * Request the data from the API
   *
   * @param       string $wp_wix_migration_tool_datatype
   *    The type of data to return.
   * @return      object $wp_wix_migration_tool_data
   *    The body of the JSON response
   *
   * @since       0.1.0
   * @uses        ../../../../wp-includes/http.php
   * @see         https://developer.wordpress.org/reference/functions/wp_remote_get/
   */
  function wp_wix_migration_tool_get_data( $wp_wix_migration_tool_datatype ) {

    $endpoint = 'http://jsonplaceholder.typicode.com/' . $wp_wix_migration_tool_datatype;

    $args = array(
      'timeout' => 30 // seconds to wait for the request to complete
    );

    $response = wp_remote_get(
      $endpoint,
      $args
    );

    /**
     * Return the body, not the header
     * Note: There is an optional boolean argument, which returns an associative array if TRUE
     */
    $wp_wix_migration_tool_data = json_decode( $response['body'] );

    return $wp_wix_migration_tool_data;
  }

}

if ( !function_exists( 'wp_wix_migration_tool_data_refresh' ) ) {

  /**
   * Refresh the data from the API
   *    The 'action' key's value, 'wp_wix_migration_tool_data_refresh',
   *    matches the latter half of the action 'wp_ajax_wp_wix_migration_tool_data_refresh' in our AJAX handler.
   *    This is because it is used to call the server side PHP function through admin-ajax.php.
   *    If an action is not specified, admin-ajax.php will exit, and return 0 in the process.
   *
   * @since       0.1.0
   * @see         https://codex.wordpress.org/AJAX_in_Plugins
   */
  function wp_wix_migration_tool_data_refresh() {

    $wp_wix_migration_tool_options = get_option('wp_wix_migration_tool');
    $last_updated = $wp_wix_migration_tool_options['last_updated'];

    $current_time = time();
    $update_difference = $current_time - $last_updated;
    $one_hour = (1 * 60 * 60);

    if ( $update_difference > $one_hour ) {

      $wp_wix_migration_tool_datatype = $wp_wix_migration_tool_options['wp_wix_migration_tool_datatype'];

      $wp_wix_migration_tool_options['wp_wix_migration_tool_data'] = wp_wix_migration_tool_get_data( $wp_wix_migration_tool_datatype );

      // inspecting the database will allow us to check
      // whether the profile is being updated
      $wp_wix_migration_tool_options['last_updated'] = time();

      update_option('wp_wix_migration_tool', $wp_wix_migration_tool_options);
    }

    /**
     * Let the Ajax know when the entire function has completed
     *
     * wp_die() vs die() vs exit()
     * Most of the time you should be using wp_die() in your Ajax callback function.
     * This provides better integration with WordPress and makes it easier to test your code.
     */
    wp_die();

  }

  add_action('wp_ajax_wp_wix_migration_tool_data_refresh', 'wp_wix_migration_tool_data_refresh');

}

?>

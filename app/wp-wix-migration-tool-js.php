<?php
/**
 * JS imports
 *
 * This file contains PHP.
 *
 * @link        http://dotherightthing.co.nz
 * @see         https://codex.wordpress.org/AJAX_in_Plugins
 * @since       0.1.0
 *
 * @package     Wp_Wix_Migration_Tool
 * @subpackage  Wp_Wix_Migration_Tool/app
 */

if ( !function_exists( 'wp_wix_migration_tool_frontend_js' ) ) {

  /**
   * Attach JS for front-end widgets and shortcodes
   *    Generate a configuration object which the JavaScript can access.
   *    When an Ajax command is submitted, pass it to our function via the Admin Ajax page.
   *
   * @since       0.1.0
   * @see         https://codex.wordpress.org/AJAX_in_Plugins
   * @see         https://codex.wordpress.org/Function_Reference/wp_localize_script
   */
  function wp_wix_migration_tool_frontend_js() {

    wp_enqueue_script( 'wp_wix_migration_tool_frontend_js',
      WP_WIX_MIGRATION_TOOL_URL . 'views/public/js/wp-wix-migration-tool.js',
      array('jquery'),
      WP_WIX_MIGRATION_TOOL_VERSION,
      true
    );

    wp_localize_script( 'wp_wix_migration_tool_frontend_js',
      'wp_wix_migration_tool_config',
      array(
        'ajax_url' => admin_url( 'admin-ajax.php' ) // wp_wix_migration_tool_config.ajax_url
      )
    );

  }

  add_action( 'wp_enqueue_scripts', 'wp_wix_migration_tool_frontend_js' );

}

?>

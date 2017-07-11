<?php
/**
 * CSS imports
 *
 * This file contains PHP.
 *
 * @link        http://dotherightthing.co.nz
 * @since       0.1.0
 *
 * @package     Wp_Wix_Migration_Tool
 * @subpackage  Wp_Wix_Migration_Tool/app
 */

if ( !function_exists( 'wp_wix_migration_tool_css_backend' ) ) {

  /**
   * Attach CSS for Settings > Wix Migration Tool
   *
   * @since       0.1.0
   */
  function wp_wix_migration_tool_css_backend() {

    wp_enqueue_style( 'wp_wix_migration_tool_css_backend',
      WP_WIX_MIGRATION_TOOL_URL . 'views/admin/css/wp-wix-migration-tool.css',
      array(),
      WP_WIX_MIGRATION_TOOL_VERSION
      //'all'
    );
  }

  add_action( 'admin_head', 'wp_wix_migration_tool_css_backend' );

}

if ( !function_exists( 'wp_wix_migration_tool_css_frontend' ) ) {

  /**
   * Attach CSS for front-end widgets and shortcodes
   *
   * @since       0.1.0
   */
  function wp_wix_migration_tool_css_frontend() {

    wp_enqueue_style( 'wp_wix_migration_tool_css_frontend',
      WP_WIX_MIGRATION_TOOL_URL . 'views/public/css/wp-wix-migration-tool.css',
      array(),
      WP_WIX_MIGRATION_TOOL_VERSION
      //'all'
    );

  }

  add_action( 'wp_enqueue_scripts', 'wp_wix_migration_tool_css_frontend' );

}

?>

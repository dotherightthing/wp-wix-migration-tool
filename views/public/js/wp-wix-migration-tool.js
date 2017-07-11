/**
 * Scripts for the public front-end
 *
 * This file contains JavaScript.
 *    PHP variables are provided in wpdtrt_soundcloud_pages_config.
 *
 * @link        http://dotherightthing.co.nz
 * @since       0.1.0
 *
 * @package     Wp_Wix_Migration_Tool
 * @subpackage  Wp_Wix_Migration_Tool/views
 */

jQuery(document).ready(function($){

	$('.wp-wix-migration-tool-badge').hover(function() {
		$(this).find('.wp-wix-migration-tool-badge-info').stop(true, true).fadeIn(200);
	}, function() {
		$(this).find('.wp-wix-migration-tool-badge-info').stop(true, true).fadeOut(200);
	});

  $.post( wp_wix_migration_tool_config.ajax_url, {
    action: 'wp_wix_migration_tool_data_refresh'
  }, function( response ) {
    //console.log( 'Ajax complete' );
  });

});

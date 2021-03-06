<?php
/**
 * Template partial for the public front-end
 *
 * This file contains PHP, and HTML.
 *
 * @link        http://dotherightthing.co.nz
 * @since       0.1.0
 *
 * @package     Wp_Wix_Migration_Tool
 * @subpackage  Wp_Wix_Migration_Tool/views
 */
?>

<?php
  // output widget customisations (not output with shortcode)
  echo $before_widget;
  echo $before_title . $title . $after_title;
?>

<div class="wp-wix-migration-tool-blocks frontend" data-number="<?php echo $number; ?>">
  <ul>

  <?php
  /**
   * cast the $number string to a number
   * this is required because we are doing a === comparison:
   * 1 == '1' => true
   * 1 === '1' => false
   */
    $max_length = (int)$number;
    $count = 0;
    $display_count = 1;

   /**
     * filter_var
     * @link http://stackoverflow.com/a/15075609
     */
    $has_enlargement = filter_var( $enlargement, FILTER_VALIDATE_BOOLEAN );

    foreach( $wp_wix_migration_tool_data as $key => $val ) {

      echo "<li>";

      echo wp_wix_migration_tool_html_image( $key, $has_enlargement );

      echo "</li>\r\n";

      $count++;
      $display_count++;

      // when we reach the end of the demo sample, stop looping
      if ($count === $max_length) {
        break;
      }
    }
    // end foreach
  ?>
  </ul>
</div>

<?php
  // output widget customisations (not output with shortcode)
  echo $after_widget;
?>

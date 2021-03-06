<?php
/**
*		MYBOOKING HOME WIDGETS PARTIAL
*  	------------------------------
*
* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.7.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php if ( is_active_sidebar( 'home_widgets_center_1' ) || is_active_sidebar( 'home_widgets_center_2' ) || 
           is_active_sidebar( 'home_widgets_center_3' ) ) { ?>
  <div class="home-widgets">
    <div class="container" tabindex="-1">
      <div class="row">
        <?php if ( is_active_sidebar( 'home_widgets_center_1' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_center_1' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_center_2' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_center_2' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_center_3' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_center_3' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php } ?>

<?php
/**
*		MYBOOKING HOME HEADER PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="hero-header-container">
  <div class="hero-header-content">

    <!-- Punchline -->

    <div class="hero-header-left">
      <div class="aligner">

        <p>

          <?php if ( is_active_sidebar( 'mybooking_home_hero_secondary' ) ) : ?>
            <?php dynamic_sidebar( 'mybooking_home_hero_secondary' ); ?>
          <?php endif; ?>

        </p>

        <?php $title_hero = get_option("home_hero_title");
    	    if ($title_hero !== '') { ?>
            <h1><?php echo $title_hero ?></h1>
        <?php }
    	  	else { ?>
            <h1><?php _e("Mybooking WordPress Theme",'mybooking'); ?></h1>
        <?php } ?>

        <?php $text_hero = get_option("home_hero_text");
    	    if ($text_hero !== '') { ?>
            <p><?php echo $text_hero ?></p>
        <?php }
    	  	else { ?>
            <p><?php _e("Lanza tu web de reservas para tu negocio de alquiler de vehiculos sin esfuerzo. Instalar y listo.",'mybooking'); ?></p>
        <?php } ?>

      </div>
    </div>

    <!-- Widget Primary -->

    <div class="hero-header-right">

      <?php if ( is_active_sidebar( 'mybooking_home_hero_primary' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero_primary' ); ?>
      <?php endif; ?>

    </div>

  </div>
</div>

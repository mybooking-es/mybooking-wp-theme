<?php
/**
*		CUSTOM POST TYPES
*  	-----------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Mybooking custom post types
 */

// Activates the Testimonials carousel if checked on Home options page
$testimonial_active = get_theme_mod( "mybooking_home_testimonial_carousel_visibility" );
if ( $testimonial_active == 1 ) {
 require_once( get_template_directory() . '/mybooking-posts/mybooking-testimonial.php' );
}

// Activates the Vehicles custom post type if checked on Global options page
$vehicle_active = get_option( "global_vehicle_active" );
if ( $vehicle_active == 1 ) {
 require_once( get_template_directory() . '/mybooking-posts/mybooking-vehicle.php' );
}

// Activates the Popup custom post type if checked on Promo options page
$popup_active = get_option( "promo_popup_active" );
if ( $popup_active == 1 ) {
require_once( get_template_directory() . '/mybooking-posts/mybooking-popup.php' );
}
?>

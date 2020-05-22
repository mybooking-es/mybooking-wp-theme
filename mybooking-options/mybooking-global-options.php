<?php
/**
*		GLOBAL CONFIGURATION
*  	--------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*
*   Topbar activation
*   Toggle button align
*   Footer layout
*   Vehicle posts activation
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'mybookinges_create_menu_global');

function mybookinges_create_menu_global() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_menu_page(
    	__("Mybooking", 'mybooking'),
    	__("Mybooking", 'mybooking'),
    	"edit_pages",
    	"config",
    	"mybookinges_configuration_home",
    	get_template_directory_uri()."/images/mybooking-logo-bn.png",
    	4.1
    	);

    add_submenu_page(
      "config",
    	__("Global options", 'mybooking'),
    	__("Global options", 'mybooking'),
    	"edit_pages",
    	"global",
    	"mybookinges_configuration_global"
    	);
      // Remove the 'automatic' add option with the same slug
      remove_submenu_page('config', 'config');

  }
}

add_action('admin_init', 'mybookinges_register_options_global');

function mybookinges_register_options_global() {

  // Define options
  add_option("global_footer_layout","","","yes");
  add_option("global_testimonials_active","","","yes");
  add_option("global_vehicle_active","","","yes");

  // Register options
  register_setting("options_global", "global_footer_layout");
  register_setting("options_global", "global_testimonial_active");
  register_setting("options_global", "global_vehicle_active");
}

function mybookinges_configuration_global() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Configuración global', 'mybooking') ?><br>
      <small><?php _e('Diferentes elementos globales del tema', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('options_global'); ?>

      <!-- Footer -->

      <h2><?php _e('Pie de página', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Footer', 'mybooking') ?></th>
          <td>
            <?php $options_footer = get_option( "global_footer_layout" ); ?>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 0 ); ?> value="0"> <span class="description"><strong><?php _e('Normal', 'mybooking') ?></strong><br><?php _e('Muestra cuatro columnas para widgets, información corporativa y enlaces sociales', 'mybooking') ?></span><br><br>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 1 ); ?> value="1"> <span class="description"><strong><?php _e('Mínimal','mybooking') ?></strong><br><?php _e('Solo muestra el copyright', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <!-- Vehicle CPT -->

      <h2><?php _e('Fichas de vehículos', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Selecciona los módulos que quieras activar', 'mybooking') ?></th>
          <td>
            <?php $vehicle_active = get_option( "global_vehicle_active" ); ?>
            <input type="checkbox" name="global_vehicle_active" <?php checked( $vehicle_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Vehículos', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="global_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>

<?php
/**
*		GLOBAL CONFIGURATION
*  	--------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/

add_action('admin_menu', 'mybookinges_create_menu_global');
add_action('admin_init', 'mybookinges_register_options_global');

function mybookinges_create_menu_global() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_submenu_page(
      "configuracion",
    	__("Opciones globales", 'mybooking'),
    	__("Opciones globales", 'mybooking'),
    	"edit_pages",
    	"global",
    	"mybookinges_configuration_global"
    	);

  }
}

function mybookinges_register_options_global() {

  // Definición de opciones
  add_option("global_google_analytics","","","yes");
  add_option("global_header_layout","","","yes");
  add_option("global_footer_layout","","","yes");
  add_option("global_testimonials_active","","","yes");
  add_option("global_promo_active","","","yes");
  add_option("global_product_active","","","yes");

  // Registro de opciones
  register_setting("options_global", "global_google_analytics");
  register_setting("options_global", "global_header_layout");
  register_setting("options_global", "global_footer_layout");
  register_setting("options_global", "global_testimonial_active");
  register_setting("options_global", "global_promo_active");
  register_setting("options_global", "global_product_active");

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

      <!-- Footer Layout -->

      <h2><?php _e('Google Analytics', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Introduce el ID de Google Analytics', 'mybooking') ?></th>
          <td><input type="text" name="global_google_analytics" size="40" value="<?php echo get_option('global_google_analytics', 'mybooking'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <h2><?php _e('Layout del header', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Escoge el tipo de cabecera', 'mybooking') ?></th>
          <td>
          <?php $options_header = get_option( "global_header_layout" ); ?>
          <input type="radio" name="global_header_layout" <?php checked( $options_header, 0 ); ?> value="0"><span class="description"><strong><?php _e('Dos columnas','mybooking') ?></strong><br><?php _e('Título y texto personalizables más dos areas para widgets', 'mybooking', 'mybooking') ?></span><br><br>
          <input type="radio" name="global_header_layout" <?php checked( $options_header, 1 ); ?> value="1"><span class="description"><strong><?php _e('Una columna', 'mybooking') ?></strong><br><?php _e('Título y texto personalizables y una zona para widgets', 'mybooking') ?></span>
        </tr>
      </table>

      <hr>

      <h2><?php _e('Layout del footer', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Escoge el tipo de footer', 'mybooking') ?></th>
          <td>
            <?php $options_footer = get_option( "global_footer_layout" ); ?>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 0 ); ?> value="0"> <span class="description"><strong><?php _e('Mínimal','mybooking') ?></strong><br><?php _e('Solo muestra el copyright', 'mybooking') ?></span><br><br>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 1 ); ?> value="1"> <span class="description"><strong><?php _e('Normal', 'mybooking') ?></strong><br><?php _e('Muestra cuatro columnas para widgets, información corporativa y enlaces sociales', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <h2><?php _e('Módulos extra', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Selecciona los módulos que quieras activar', 'mybooking') ?></th>
          <td>
            <?php $testimonial_active = get_option( "global_testimonial_active" ); ?>
            <input type="checkbox" name="global_testimonial_active" <?php checked( $testimonial_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Testimonios', 'mybooking') ?></span>
          <br>
            <?php $promo_active = get_option( "global_promo_active" ); ?>
            <input type="checkbox" name="global_promo_active" <?php checked( $promo_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Promociones', 'mybooking') ?></span>
          <br>
            <?php $product_active = get_option( "global_product_active" ); ?>
            <input type="checkbox" name="global_product_active" <?php checked( $product_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Productos', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <p class="submit">
      	<input name="global_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>

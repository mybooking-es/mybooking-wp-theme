<?php
/**
*		COMPANY INFO CONFIGURATION
*  	--------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

add_action('admin_menu', 'mybookinges_create_menu_company_info');
add_action('admin_init', 'mybookinges_register_options_company_info');

function mybookinges_create_menu_company_info() {
  if (!current_user_can('manage_options') || current_user_can('administrator'))
    add_submenu_page(
      "configuracion",
    	__("Información corporativa"),
    	__("Información corporativa"),
    	"edit_pages",
    	"info",
    	"mybookinges_configuration_company_info"
    	);
}

function mybookinges_register_options_company_info() {

  // Definición de opciones
  add_option("company_info_trade_name","","","yes");
  add_option("company_info_name","","","yes");
  add_option("company_info_nif","","","yes");

  add_option("company_info_adress","","","yes");
  add_option("company_info_phone","","","yes");
  add_option("company_info_email","","","yes");

  add_option("company_info_twitter_url","","","yes");
  add_option("company_info_facebook_url","","","yes");
  add_option("company_info_instagram_url","","","yes");
  add_option("company_info_linkedin_url","","","yes");

  add_option("contact_section_title","","","yes");
  add_option("contact_section_subtitle","","","yes");
  add_option("contact_map_code","","","yes");

  // Registro de opciones
  register_setting("options_company_info", "company_info_trade_name");
  register_setting("options_company_info", "company_info_name");
  register_setting("options_company_info", "company_info_nif");

  register_setting("options_company_info", "company_info_adress");
  register_setting("options_company_info", "company_info_phone");
  register_setting("options_company_info", "company_info_email");

  register_setting("options_company_info", "company_info_twitter_url");
  register_setting("options_company_info", "company_info_facebook_url");
  register_setting("options_company_info", "company_info_instagram_url");
  register_setting("options_company_info", "company_info_linkedin_url");

  register_setting("options_company_info", "contact_section_title");
  register_setting("options_company_info", "contact_section_subtitle");
  register_setting("options_company_info", "contact_map_code");

}

function mybookinges_configuration_company_info() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      Información del negocio<br>
      <small>Aparece en varios lugares del tema, incluyendo el template 'MyBooking Contacto'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('options_company_info'); ?>

      <!-- Información corporativa -->

      <h2>Información corporativa</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Denominación del negocio</th>
          <td><input type="text" name="company_info_trade_name" size="40" value="<?php echo get_option('company_info_trade_name'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Razón social</th>
          <td><input type="text" name="company_info_name" size="40" value="<?php echo get_option('company_info_name'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Número de Identificación Fiscal</th>
          <td><input type="text" name="company_info_nif" size="40" value="<?php echo get_option('company_info_nif'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Información de contacto -->

      <h2>Información de contacto</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Dirección postal</th>
          <td><input type="text" name="company_info_adress" size="40" value="<?php echo get_option('company_info_adress'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Teléfono de contacto</th>
          <td><input type="text" name="company_info_phone" size="40" value="<?php echo get_option('company_info_phone'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Email de contacto</th>
          <td><input type="text" name="company_info_email" size="40" value="<?php echo get_option('company_info_email'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Redes sociales -->

      <h2>Enlaces sociales</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Twitter</th>
          <td><input type="text" name="company_info_twitter_url" size="40" value="<?php echo get_option('company_info_twitter_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Twitter</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Facebook</th>
          <td><input type="text" name="company_info_facebook_url" size="40" value="<?php echo get_option('company_info_facebook_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Facebook</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Instagram</th>
          <td><input type="text" name="company_info_instagram_url" size="40" value="<?php echo get_option('company_info_instagram_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Instagram</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">LinkedIn</th>
          <td><input type="text" name="company_info_linkedin_url" size="40" value="<?php echo get_option('company_info_linkedin_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de LinkedIn</span></td>
        </tr>
      </table>

      <hr>

      <!-- Ajustes del template Contacto -->

      <h2>Página Contacto</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la sección</th>
          <td><input type="text" name="contact_section_title" size="40" value="<?php echo get_option('contact_section_title'); ?>" />
          <br><span class="description">Aparece en la columna de información del template Mybooking-contact</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Subtítulo de la sección</th>
          <td><input type="text" name="contact_section_subtitle" size="40" value="<?php echo get_option('contact_section_subtitle'); ?>" />
          <br><span class="description">Aparece en la columna de información del template Mybooking-contact</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Mapa de localización</th>
          <td><textarea name="contact_map_code" cols="37" rows="10"><?php echo get_option('contact_map_code'); ?></textarea>
          <br><span class="description">Pega aquí el código de Google Maps</span></td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="company_info_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
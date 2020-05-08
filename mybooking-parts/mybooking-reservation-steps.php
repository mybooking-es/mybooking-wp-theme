<?php
/**
*		RESERVATION STEPS
*  	-----------------

* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*
*   Notes:
*   ------
*
*   The wizard container is included in order to be able to show the selection
*   wizard in the reservation steps (choose product - checkout)
*
*/
?>

<!-- Wizard container -->
<div class="wizard-container full-size-datepicker-container" id="wizard_container">
  <div class="wizard-step_header container">
    <span class="wizard-close" id="close_wizard_btn">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon.png" alt="X">
    </span>
    <div class="wizard-step_title step_title" id="step_title"></div>
  </div>
  <div class="wizard-step_container" id="wizard_container_step">
    <div class="wizard-step_summary" id="wizard_container_step_header"></div>
    <div class="wizard-step_body" id="wizard_container_step_body"></div>
  </div>
</div>

<div class="steps-wrapper">
  <div id="steps">

    <?php
      $classes = get_body_class();

      if ( in_array('choose_product',$classes) ) {
        $choose_active = 'active';
        $step = __('Seleccionar producto', 'mybooking');
      } elseif ( in_array('complete',$classes) ) {
        $complete_active = 'active';
        $step = __('Completar reserva', 'mybooking');
      } elseif ( in_array('summary',$classes) ) {
        $summary_active = 'active';
        $step = __('Resumen', 'mybooking');
      } ?>

    <div data-desc="<?php _e( 'Lugar y Fecha', 'mybooking' ) ?>" class="step">1</div>
    <div data-desc="<?php _e( 'Seleccionar producto', 'mybooking' ) ?>" class="<?php echo $choose_active ?> step">2
    </div>
    <div data-desc="<?php _e( 'Completar Reserva', 'mybooking' ) ?>" class="<?php echo $complete_active ?> step">3</div>
    <div data-desc="<?php _e( 'Sumario', 'mybooking' ) ?>" class="<?php echo $summary_active ?> step">4</div>
  </div>
  <h2 class="steps_title"><?php echo _e( $step, 'mybooking') ?></h2>
</div>
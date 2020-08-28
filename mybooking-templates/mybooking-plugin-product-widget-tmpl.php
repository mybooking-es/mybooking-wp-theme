<?php
/**
*   PLUGIN PRODUCT WIDGET TEMPLATE
*   ------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.0
*/
?>

<script type="text/tmpl" id="form_calendar_selector_tmpl">
  <% if (configuration.pickupReturnPlace) { %> 
        <!-- Pickup Place -->
        <div class="form-group"  class="pickup_place_group">
          <label
            for="pickup_place"><?php echo _x( 'Select pick-up place', 'renting_product_calendar', 'mybooking-wp-plugin') ?></label>
          <select id="pickup_place" name="pickup_place" placeholder="Seleccionar lugar de entrega" 
                  class="form-control w-100"></select>
        </div>

        <!-- Return place -->
        <div class="form-group" class="return_place">
          <label
            for="pickup_place"><?php echo _x( 'Select return place', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?></label>
          <select id="return_place" name="return_place" placeholder="Seleccionar lugar de devolución" 
                  class="form-control w-100"></select>
        </div>
      <% } %>

        <!-- Availability calendar -->
        <div class="form-group">
          <input id="date" type="hidden" name="date"/>
          <div id="date-container" class="disabled-picker"></div>
        </div>

      <% if (configuration.timeToFrom) { %>  
        <!-- Pickup/return time -->
        <div class="form-group time_selector_container">
            <label for="time_from"><?php echo _x( 'Delivery time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_from" name="time_from" placeholder="hh:mm" disabled 
                    class="form-control w-100"> </select>
        </div>

        <div class="form-group time_selector_container">
            <label for="time_to"><?php echo _x( 'Collection time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_to" name="time_to" placeholder="hh:mm" disabled 
                    class="form-control w-100"> </select>
        </div>
      <% } else { %>
        <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
        <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>  
      <% } %>  
      <!-- Reservation detail -->
      <div id="reservation_detail">
      </div>
        
</script>

<script type="text/tmpl" id="script_reservation_summary">

  <br>
  <hr>
  <% if (product_available) { %>    
    <h4 class="brand-primary my-3">
      <?php echo _x( 'Reservation summary', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h4>

    <% if (shopping_cart.days > 0) { %>
    <p class="color-gray-600"><?php echo _x( 'Rental duration', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?>:
      <span><%=shopping_cart.days%>
        <?php echo _x( 'day(s)', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?></span></p>
    <% } else if (shopping_cart.hours > 0) { %>
    <p class="color-gray-600"><?php echo _x( 'Rental duration', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?>:
      <span><%=shopping_cart.hours%>
        <?php echo _x( 'hours(s)', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?></span></p>
    <% } %>

    <h5><?php echo _x('Product', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h5>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

    <% if (shopping_cart.time_from_cost > 0) { %>
    <h6><?php echo _x('Pick-up time supplement', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></p>
    <% } %>

    <% if (shopping_cart.pickup_place_cost > 0) { %>
    <h6><?php echo _x('Pick-up place supplement', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></p>
    <% } %>

    <% if (shopping_cart.time_to_cost > 0) { %>
    <h6><?php echo _x('Return time supplement', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></p>
    <% } %>

    <% if (shopping_cart.return_place_cost > 0) { %>
    <h6><?php echo _x('Return place supplement', 'renting_product_calendar', 'mybooking-wp-plugin') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></p>
    <% } %>

    <h4 class="color-brand-primary my-3">
    <?php echo _x( 'Total', 'renting_product_calendar', 'mybooking-wp-plugin' ) ?>
    </h4>
    <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>
    
    <hr>

    <div class="form-row">
      <div class="col-md-12">
        <button id="add_to_shopping_cart_btn" class="btn btn-outline-dark my-5 w-100" type="submit">Reservar</button>
      </div>
    </div>
  <% } else { %>
    <% if (product_type == 'resource') { %>
      <div class="alert alert-danger">
        <p>
          <?php echo _x( 'Sorry, there is no availability during these hours', 'renting_product_calendar', 'mybooking-wp-plugin') ?>
        </p>
      </div>
    <% } else if (product_type == 'category_of_resources') { %>
      <div class="alert alert-warning">
        <p>
          <?php echo _x( 'Sorry, there is no availability for the entire period. The calendar shows those days when there is availability, but it may not be available for certain consecutive dates.', 'renting_product_calendar', 'mybooking-wp-plugin') ?>
        </p>
        <p></p>
      </div>
    <% } %>
  <% } %>  

</script>
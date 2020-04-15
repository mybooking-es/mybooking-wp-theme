<?php
/**
*   PLUGIN SUMMARY TEMPLATE
*   -----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">

  <!-- Desktop reservation detail -->
  <div class="product-detail-container d-none d-md-flex">
    <div class="product-detail-content">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
        <% var booking_line = booking.booking_lines[idx]; %>
        <h2 class="product-name"><%=booking_line.item_description_customer_translation%></h2>
        <p class="detail-text">
        <?php _e('Duración del alquiler','mybooking') ?>: <%=booking.days%> <?php _e('día/s','mybooking') ?></p>
      <% } %>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_from_full_format%> / <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_to_full_format%> / <%=booking.time_to%></li>
        <li><%=booking.return_place_customer_translation%></li>
      </ul>
    </div>
    <div class="product-detail-image">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
        <img class="img-fluid" src="<%=booking_line.photo_full%>" alt="">
      <% } %>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="col bg-white shadow-bottom py-3 px-3 mt-5">
          <h4 class="color-brand-primary my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
          <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row"><?php _e('Nombre', 'mybooking') ?>:</th>
                    <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                  </tr>
                  <tr>
                    <th scope="row"><?php _e('Correo electrónico', 'mybooking') ?>:</th>
                    <td><%=booking.customer_email%></td>
                  </tr>
                  <tr>
                    <th scope="row"><?php _e('Teléfono', 'mybooking') ?>:</th>
                    <td><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <br>
        <div id="reservation_form_container" class="col bg-white shadow-bottom py-3 px-3" style="display:none"></div>
        <br>
      </div>
      <!-- Sidebar -->
      <div class="col-md-4">
        <div class="col sidebar bg-white shadow-bottom py-3 px-3 my-5">
          <h4 class="color-brand-primary my-3"><?php _e('Detalle de la reserva', 'mybooking') ?></h4>
          <h5><?php _e('Total producto', 'mybooking') ?></h5>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.item_cost)%></p>

          <% if (booking.booking_extras.length > 0) { %>
            <hr>
            <h5><?php _e('Extras', 'mybooking') ?></h5>
            <ul class="list-group">
            <% for (var idx=0; idx<booking.booking_extras.length; idx++) { %>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="extra-name"><%=booking.booking_extras[idx].extra_description_customer_translation%></span>
                <span class="badge badge-primary badge-pill"><%=booking.booking_extras[idx].quantity%></span>
                <span class="extra-price"><%=configuration.formatCurrency(booking.booking_extras[idx].extra_cost)%></span>
              </li>
            <% } %>
            </ul>
          <% } %>

          <% if (booking.extras_cost > 0) { %>
              <hr>
              <h5><?php _e('Total extras', 'mybooking') ?></h5>
              <p class="color-gray-600"><%=configuration.formatCurrency(booking.extras_cost)%></p>
          <% } %>

          <% if (booking.time_from_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento hora de entrega', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.time_from_cost)%></p>
          <% } %>

          <% if (booking.pickup_place_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento lugar de entrega', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.pickup_place_cost)%></p>
          <% } %>

          <% if (booking.time_to_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento hora de devolución', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.time_to_cost)%></p>
          <% } %>

          <% if (booking.return_place_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento lugar de devolución', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.return_place_cost)%></p>
          <% } %>

          <% if (booking.driver_age_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento edad del conductor', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.driver_age_cost)%></p>
          <% } %>

          <% if (booking.category_supplement_1_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento combustible', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></p>
          <% } %>

          <hr>
          <h5 class="color-brand-primary"><?php _e('Importe total', 'mybooking') ?></h5>
          <p class="total-price"><%=configuration.formatCurrency(booking.total_cost)%></p>

          <hr>
          <h6><?php _e('Importe pagado', 'mybooking') ?></h5>
          <p class="total-price"><%=configuration.formatCurrency(booking.total_paid)%></p>

          <hr>
          <h6><?php _e('Importe pendiente', 'mybooking') ?></h5>
          <p class="total-price <% if (booking.total_pending > 0){ %>text-danger<%}%>"><%=configuration.formatCurrency(booking.total_pending)%></p>

        </div><!-- /.col.sidebar -->

        <div id="payment_detail" class="col bg-white shadow-bottom py-3 px-3" style="display:none"></div>
        <br>

      </div><!-- /col -->
    </div><!-- /row -->
  </div><!-- /container-fluid -->

</script>

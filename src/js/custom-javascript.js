// Add your custom JS here.
$(document).ready(function() {
  // CARRUSELES
  $(".-carrusel-un-item").owlCarousel({
    autoPlay: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    singleItem: true,
    pagination: false,
    navigation: true,
    navigationText: ["«", "»"]
  });

  $(".-carrusel-tres-items").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["«", "»"],
    pagination: false,
    items: 3,
    itemsDesktop: [1200, 3],
    itemsDesktopSmall: [400, 1]
  });

  $(".-carrusel-cuatro-items").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["«", "»"],
    pagination: false,
    items: 4,
    itemsDesktop: [1200, 3],
    itemsDesktopSmall: [400, 1]
  });
});

// Form Selector
$(document).ready(function() {
  var height = $("#form-selector").offset().top;
  var is_mobile = false;

  if ($(".navbar-toggler").is(":visible")) {
    is_mobile = true;
  }
  if (!is_mobile) {
    $(window).on("scroll", function() {
      if ($(".navbar-toggler").is(":visible")) {
        $("#form-selector").removeClass("flex-form-sticky");
      } else if ($(window).scrollTop() > height) {
        $("#form-selector").addClass("flex-form-sticky");
      } else {
        $("#form-selector").removeClass("flex-form-sticky");
      }
    });
  }
});

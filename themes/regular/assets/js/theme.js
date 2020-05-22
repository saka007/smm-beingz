(function($) {
  "use strict";
  var navbarCollapse = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      $("#headerNav").addClass("shrink");
      $("#headerNav .site-logo").removeClass("d-none");
      $("#headerNav .site-logo-white").addClass("d-none");
    } else {
      $("#headerNav").removeClass("shrink");
      $("#headerNav .site-logo").addClass("d-none");
      $("#headerNav .site-logo-white").removeClass("d-none");
    }
  };
  navbarCollapse();
  $(window).scroll(navbarCollapse);
})(jQuery);
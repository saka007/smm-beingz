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
  
  $(".pricing-pack").hover(function(){
    $(this).toggleClass("popular-tag");
  });

})(jQuery);

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
} 
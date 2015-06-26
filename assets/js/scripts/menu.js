//Menu
$(document).ready(function() {
  $('#menu-link').click(function() {
    $('body').toggleClass('active');
  });
});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 75) {
        //clearHeader, not clearheader - caps H
        $(".menu").addClass("menu--small");
    }
    if (scroll < 75) {
        //clearHeader, not clearheader - caps H
        $(".menu").removeClass("menu--small");
    }
});

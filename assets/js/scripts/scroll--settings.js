//smooth scroll
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

var footroom = document.querySelector(".footroom");
var backToTop  = new Headroom(footroom, {
  offset : 40,
  tolerance : 3,
  classes : {
    // when element is initialised
    initial : "footroom",
    // when scrolling up
    pinned : "footroom--pinned",
    // when scrolling down
    unpinned : "footroom--unpinned",
    // when above offset
    top : "footroom--top",
    // when below offset
    notTop : "footroom--not-top"
  }
});
backToTop.init();

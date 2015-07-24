var footroom = document.querySelector(".footroom");
var backToTop  = new Headroom(footroom, {
  offset : 60,
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

//arrow navigation
$(document).ready(function(){$(document).keydown(function(e){var t=false;if(e.which==37){t=$('a[rel="prev"]').attr("href")}else if(e.which==39){t=$('a[rel="next"]').attr("href")}if(t){window.location=t}})})

//smooth scroll
$(document).ready(function(){$(".top-link").click(function(){$("body,html").animate({scrollTop:0},800);return false})})

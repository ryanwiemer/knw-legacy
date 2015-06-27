//Slider (Slick.js settings)

$(document).ready(function() {
  $('.slider').slick({
    dots: false,
    infinite: true,
    speed: 500,
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 1,
    arrrows: true,
    accessibility: true,
    fade: true,
    prevArrow: "<button class='arrow-prev'>&#xe804;</button>",
    nextArrow: "<button class='arrow-next'>&#xe805;</button>"
  });
});

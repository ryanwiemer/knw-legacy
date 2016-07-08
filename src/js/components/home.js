import $ from 'jquery'
import slick from 'slick-carousel';

$('.slider').slick({
  arrows: false,
  dots: false,
  infinite: true,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 5000,
  fade: true,
});

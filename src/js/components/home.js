import slick from 'slick-carousel';

const Home = (function() {
  window.$('.slider').slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 500,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
  });
})();

export default Home;

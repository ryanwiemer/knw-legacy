import $ from 'jquery'
import responsiveNav from 'responsive-nav';
import Headroom from 'headroom.js';

const nav = responsiveNav('.menu ul', {
  animate: true,
  transition: 300,
  label: '&#xe609',
  insert: 'before',
  closeOnNavClick: false,
  openPos: 'relative',
  navClass: 'nav-collapse',
  navActiveClass: 'js-nav-active',
  jsClass: 'js',
});
const header = document.querySelector('header');
const headroom = new Headroom(header, {
  offset: 40,
  tolerance: 5,
});
headroom.init();

// Smooth Scrolling Script
// https://css-tricks.com/snippets/jquery/smooth-scrolling/
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

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

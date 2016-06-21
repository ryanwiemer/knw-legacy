import '../../../node_modules/jquery/dist/jquery.js';
import '../../../node_modules/responsive-nav/responsive-nav.js';

$(document).ready(function () {
  const nav = responsiveNav(".menu ul", {
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
});

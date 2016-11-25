import $ from 'jquery';
import '../vendor/jquery.jscroll.min.js';

const Gallery = (function() {
  $('.gallery-list').jscroll({
    padding: 100,
    autoTrigger: true,
    loadingHtml: '<img class="loader" src="/wp-content/themes/knw/dist/img/loading.gif" />',
    nextSelector: 'a.btn-pagination--next',
    contentSelector: '.infinite-selector'
});
})();

export default Gallery;

/*

import $ from 'jquery';
import '../vendor/jquery-ias.min.js';

const Gallery = (function() {
  const scrollSettings = $.ias({
      container: '.gallery-list',
      item: '.gallery',
      pagination: '.pagination',
      next: '.btn-pagination--next',
      negativeMargin: '250'
    }).extension(new IASSpinnerExtension({
    src: '/wp-content/themes/knw/dist/img/loading.gif',
  }));
})();


export default Gallery;


*/

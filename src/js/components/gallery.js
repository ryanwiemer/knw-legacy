import $ from 'jquery';
import '../vendor/jquery-ias.min.js';

jQuery.ias({
    container: '.gallery-list',
    item: '.gallery',
    pagination: '.pagination',
    next: '.btn-pagination--next',
    negativeMargin: '250'
  }).extension(new IASSpinnerExtension({
    src: '/wp-content/themes/knw/dist/img/loading.gif'
  }));

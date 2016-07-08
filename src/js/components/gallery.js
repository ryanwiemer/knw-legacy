import $ from 'jquery'
import 'jquery-ias';

const ias=jQuery.ias({
  container: '.gallery-list',
  item: '.gallery',
  pagination: '.pagination',
  next: '.btn-pagination--next',
  negativeMargin: '250'
});
ias.extension(new IASSpinnerExtension({
  src: '/wp-content/themes/knw/dist/img/loading.gif'
}));

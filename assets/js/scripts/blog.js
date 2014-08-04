//Gallery

var ias = jQuery.ias({
    container:  '.blog-list',
    item:       '.blog-post',
    pagination: '.pagination',
    next:       '.btn-pagination--next',
    negativeMargin: '250'
});
ias.extension(new IASSpinnerExtension({
    src: '../wp-content/themes/knw/assets/img/spinner.gif',
}));

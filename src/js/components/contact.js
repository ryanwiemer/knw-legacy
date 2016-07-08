import $ from 'jquery';
import datepicker from  'jquery-ui/datepicker';
import ajaxSubmit from 'jquery-form';
import validate from 'jquery-validation';

// Datepicker Code
const dateToday = new Date();
$('.form__date__datepicker').datepicker({
  minDate: dateToday,
});

// jQuery Validate and jQuery Form Code
$(function() {
    $('.form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
            },
            date: {
                required: false,
            },
            reason: {
                required: true,
            },
            bot: {
                required: false,
            },
        },
        errorPlacement: function () { },
        submitHandler: function(form) {
            if($('.form__bot__input').val().length===0){
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                clearForm: true,
                url:"../wp-content/themes/knw/mail.php",
                error: function() {
                  $('.form__error').fadeIn().delay( 2000 ).fadeOut();
                },
                success: function() {
                  $('.form__success').fadeIn().delay( 2000 ).fadeOut();
                }
            });
        }
      }
    });
});

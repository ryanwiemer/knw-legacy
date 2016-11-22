import datepicker from 'jquery-ui/ui/widgets/datepicker';
import ajaxSubmit from 'jquery-form';
import validate from 'jquery-validation';

const Contact = (function() {
  // Datepicker Code
  const dateToday = new Date();
  window.$('.form__date__datepicker').datepicker({
    minDate: dateToday,
  });

  // jQuery Validate and jQuery Form Code
  window.$(function() {
      window.$('.form').validate({
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
              if(window.$('.form__bot__input').val().length===0){
              window.$(form).ajaxSubmit({
                  type:"POST",
                  data: $(form).serialize(),
                  clearForm: true,
                  url:"../wp-content/themes/knw/mail.php",
                  error: function() {
                    window.$('.form__error').fadeIn().delay( 2000 ).fadeOut();
                  },
                  success: function() {
                    window.$('.form__success').fadeIn().delay( 2000 ).fadeOut();
                  }
              });
          }
        }
      });
  });
})();

export default Contact;

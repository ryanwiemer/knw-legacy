// jQuery Validation Settings
jQuery(function() {
    jQuery('.form').validate({
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
            if(jQuery('.form__bot__input').val().length===0){
            jQuery(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                clearForm: true,
                url:"../wp-content/themes/knw/mail.php",
                error: function() {
                        $('.form__error').fadeIn().delay( 1000 ).fadeOut();
                },
                success: function() {
                        $('.form__success').fadeIn().delay( 1000 ).fadeOut();
                }
            });
        }
      }
    });
});

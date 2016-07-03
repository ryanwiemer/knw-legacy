// jQuery UI Datepicker Settings
$(function() {
  var dateToday = new Date();
    $( ".form__date__datepicker" ).datepicker({
      minDate: dateToday
    });
  });

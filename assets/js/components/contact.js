import $ from 'jquery';
import { datepicker } from  'jquery-ui';
// import from 'jquery-form';
// import jqueryValidation from 'jquery-validation';

const dateToday = new Date();
$('.form__date__datepicker').datepicker({
  minDate: dateToday,
});

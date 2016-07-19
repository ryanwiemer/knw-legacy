import $ from 'jquery';
import baguetteBox from 'baguettebox.js';
import Headroom from 'headroom.js';

const Single = (function() {
// BaguetteBox
  baguetteBox.run('.baguetteBox', {
    noScrollbars: true,
    buttons: false,
    overlayBackgroundColor: '#f1f1f1',
  });

  // Back To Top Button
  $(".footroom").click(function(){$("body,html").animate({scrollTop:0},800);return false});

  // Footroom Settings
  const footroomContainer=document.querySelector(".footroom");
  const footroom=new Headroom(footroomContainer, {
    offset: 60,
    tolerance: 5,
    classes:{
      initial:"footroom",
      pinned:"footroom--pinned",
      unpinned:"footroom--unpinned",
      top:"footroom--top",
      notTop:"footroom--not-top"
      }
  });
  //footroom.init();
})();

export default Single;

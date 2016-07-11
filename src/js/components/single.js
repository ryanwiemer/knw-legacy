import baguetteBox from 'baguettebox.js';
import Headroom from 'headroom.js';

baguetteBox.run('.baguetteBox', {
  noScrollbars: true,
  buttons: false,
  overlayBackgroundColor: '#f1f1f1',
});


// Back to Top Button
const footroom=document.querySelector(".footroom")
const backToTop=new Headroom(footroom,{
  offset:60,
  tolerance:5,
  classes:{
    initial:"footroom",
    pinned:"footroom--pinned",
    unpinned:"footroom--unpinned",
    top:"footroom--top",
    notTop:"footroom--not-top"
    }
});
$(".footroom").click(function(){$("body,html").animate({scrollTop:0},800);return false});

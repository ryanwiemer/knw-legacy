//Back to top single--settings
var footroom=document.querySelector(".footroom"),backToTop=new Headroom(footroom,{offset:60,tolerance:5,classes:{initial:"footroom",pinned:"footroom--pinned",unpinned:"footroom--unpinned",top:"footroom--top",notTop:"footroom--not-top"}});backToTop.init();

//Smooth scroll
$(document).ready(function(){$(".footroom").click(function(){$("body,html").animate({scrollTop:0},800);return false});});

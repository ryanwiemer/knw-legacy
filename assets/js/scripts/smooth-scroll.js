//arrow navigation
$(document).ready(function(){$(document).keydown(function(e){var t=false;if(e.which==37){t=$('a[rel="prev"]').attr("href")}else if(e.which==39){t=$('a[rel="next"]').attr("href")}if(t){window.location=t}})})

//smooth scroll
$(document).ready(function(){$("gallery #return-top").click(function(){$("body,html").animate({scrollTop:0},800);return false})})

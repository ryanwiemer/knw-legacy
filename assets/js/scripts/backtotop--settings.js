jQuery(document).ready(function($){
  	var offset = 300;
    var scroll_top_duration = 700;
		$back_to_top = $('.top-link--arrow');
    $top_link = $('.top-link');

  	$(window).scroll(function(){
  		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('top-link--visible') : $back_to_top.removeClass('top-link--visible');
  	});

  	//smooth scroll to top
  	$top_link.on('click', function(event){
  		event.preventDefault();
  		$('body,html').animate({
  			scrollTop: 0 ,
  		 	}, scroll_top_duration
  		);
  	});
  });

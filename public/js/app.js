// Documentation can be found at: http://foundation.zurb.com/docs

jQuery(document).ready(function($) {
	var 
	$doc = $(document),
	$win = $(window);

	//load foundation
	$(document).foundation();
	
	//load slider script
		$('.social-slider').slick({
			accessibility: true,
	  		autoplay: true,
	  		autoplaySpeed: 10000,
	  		arrows: false
		});
	
});
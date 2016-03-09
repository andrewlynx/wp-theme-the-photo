(function ($, root, undefined) {
	
	$(window).load(function () {
		
		'use strict';
		
		/*Browser Update Alert*/
		if ($('.no-csstransitions').length > 0){
			alert("You are using old browser that do not shows this page alright. Please update your browser or intall latest version of Chrome or Mozilla");
		}
		
		/*Menu Button*/
		if ($('.sidebar-button').length > 0) {
	        $('.sidebar-button').on('click', function() {
	            $(this).toggleClass('active');
	            if ($('#sidebar').length > 0) {
	                $('#sidebar').toggleClass('active');
	                $('html').bind('click', function() {
	                    if ($('#sidebar').hasClass('active')) {
	                        $('.sidebar-button').toggleClass('active');
	                        $('#sidebar').toggleClass('active');
	                    }
	                    $('html').unbind('click');
	                });
	                $('#sidebar').click(function(event) {
	                    event.stopPropagation();
	                });
	            }
	            return false;
	        });
			
		}
		
		/*Sidebar scroll JS*/
		if ($("#sidebar").length > 0) {
	        $("#sidebar").mCustomScrollbar({
	        	axis:"y",
	            theme: "minimal",
	            scrollInertia: 600
	        });
	    }
		
		/*Single post slider*/
		if($(".post-slider").length > 0) {
			var slider_items = thePhoto.slider_items;
			$(".post-slider").owlCarousel({
				autoPlay: true,
				slideSpeed: 200,
				items: slider_items,
				dots: false,
				loop: true,
			});
		}
	});
	
})(jQuery, this);

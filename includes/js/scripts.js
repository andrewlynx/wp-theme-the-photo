(function ($, root, undefined) {
	
	/*Slider Proportions Function*/
	var slider_prop = function(){
		var width = $(window).width(),
			team_height = $('.photo-team').height();
			console.log(team_height);
		if(width > 768) {
			$('.photo-team').css('top', width / 2 - team_height - 2);
			$('.header-img, .slider-wrapper, .header-slide').css('height', width / 2);
		} else {
			$('.photo-team').css('top', width / 2 - 2);
			$('.header-img, .header-slide').css('height', width / 2);
			$('.slider-wrapper').css('height', width / 2 + team_height );
		}
	}
	
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
				nav: false,
			});
		}
		
		/*Preloader*/
		if ($('.preloader').length > 0) {
	        $('.preloader').fadeOut('400', function() {
	            $(this).remove();
	            $('body').removeClass('loading');
	        });
	    }
		
		/*Slider Proportions*/
		slider_prop();
		
	});
	
	$(window).resize(function () {
		slider_prop();
	});
	
})(jQuery, this);

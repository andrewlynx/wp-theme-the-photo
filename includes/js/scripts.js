(function ($, root, undefined) {
	
	var	menu_crop = themeOptions.menu_width;

	/*Slider Proportions Function*/
	var slider_prop = function(){
		var width = $(window).width(),
			team_height = $('.photo-team').height();
			menu_height = $('.header-menu').height();
		if(width > 768) {
			$('.header-img, .slider-wrapper, .header-slide').css('height', width / 2);
		} else {
			$('.header-img, .header-slide').css('height', width / 2);
			$('.slider-wrapper').css('height', width / 2 + team_height );
		}
	}
	
	/*Menu Width Function*/
	var menu_width = function(){
		if ( $('.header-menu').length > 0 && menu_crop == 'true' ) {
			var logoWidth = $('#masthead .site-branding').width();
			var containerWidth = $('.header-menu').parent().width();
			var menuWidth = containerWidth - logoWidth;
			$('.header-menu').css('width', menuWidth);
		}
	}

	/*Single post slider*/
	var post_slider = function(){
		if($(".post-slider").length > 0) {
			var slider_items = sliderOptions.slider_items;
			$(".post-slider").owlCarousel({
				autoplay:true,
    			autoplayTimeout:2000,
				slideSpeed: 400,
				items: slider_items,
				dots: true,
				loop: true,
				nav: false,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			            nav:false
			        },
			        600:{
			            items:slider_items,
			            nav:false
			        },
			    }
			});
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
		
		/*Sidebar submenu open*/
		if($("#sidebar .sidebar-menu").length > 0) {
			$('#sidebar .sidebar-menu .page_item_has_children').click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				$(this).children('.children').slideToggle();
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
		/*Menu Width*/
		menu_width();
		post_slider();
		
	});
	
	$(window).scroll(function() {
		$('.blog article').each(function(){
		var imagePos = $(this).offset().top;
		var windowHeight = $(window).height();

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+windowHeight*0.8) {
				$(this).addClass("visible");
			}
		});
	});
	
	$(window).resize(function () {
		slider_prop();
		menu_width();
		post_slider();
	});
	
})(jQuery, this);

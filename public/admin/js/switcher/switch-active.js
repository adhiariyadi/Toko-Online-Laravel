(function ($) {
 "use strict";
 
	/*------------------------------------
		ColorSwitcher
		--------------------------------------*/
		$('.ec-handle').on('click', function(){
			$('.ec-colorswitcher').trigger('click')
			$(this).toggleClass('btnclose');
			$('.ec-colorswitcher') .toggleClass('sidebarmain');
			return false;
		});
		$('.ec-boxed,.pattren-wrap a,.background-wrap a').on('click', function(){
			$('.as-mainwrapper').addClass('wrapper-boxed');
			$('body').addClass('wrapper-boxed-body');
			$('.as-mainwrapper').removeClass('wrapper-wide');
		});
		$('.ec-wide').on('click', function(){
			$('.as-mainwrapper').addClass('wrapper-wide');
			$('.as-mainwrapper').removeClass('wrapper-boxed');
			$('body').removeClass('wrapper-boxed-body');
		});
		
 
})(jQuery); 
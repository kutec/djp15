/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function($) {
	$('#header').on('click', '#navTrigger', function(){
		$(this).toggleClass('btn--opened');
		$('#nav').slideToggle(150);
	});
} )(jQuery);

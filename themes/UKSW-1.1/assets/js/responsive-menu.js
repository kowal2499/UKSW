jQuery(window).scroll( function() {

	var currentScrollPos = jQuery(this).scrollTop();
	var navAlfa = jQuery('#navigation-alfa');
	var navBeta = jQuery('#navigation-beta');

	if  (currentScrollPos > 1) {
		navAlfa.addClass("squizzed");
	} else {
		navAlfa.removeClass("squizzed");
	}

	// special behavior for navBeta on front page
	var navBetaSpecial = jQuery(".welcome-screen #navigation-beta");
	if (navBetaSpecial.length) {
		var imgHeight = jQuery('.welcome-screen').height();
		var navAlfaHeight = 50;
		var navBetaHeight = navBeta.height()
		var wordpressAdminBarHeight = jQuery('#wpadminbar').height();

		if (currentScrollPos > (imgHeight - navAlfaHeight- navBetaHeight)) {
			navBeta.addClass("beta-sticked");
			navBeta.css("top", navAlfaHeight+wordpressAdminBarHeight);
		} else {
			navBeta.removeClass("beta-sticked");
			navBeta.css("top", "auto");
		}
	}
});



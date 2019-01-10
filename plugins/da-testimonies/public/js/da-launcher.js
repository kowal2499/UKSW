jQuery(document).ready(function() {
	jQuery('#da-owl').owlCarousel({
		items: 3,
		margin: 20,
		loop: true,
		autoplay: true,
		autoplayTimeout: 6000,
		nav:false,
		dots:true,
		responsive:{
        	0:{
            	items:1
        	},
        	600:{
            	items:3
        	}
		}})
});

<?php

function erla_owlcarousel_simple_admin_enq() {}


// frontend styles & scripts
function erla_owlcarousel_simple_enq() {
	wp_enqueue_style("owl.carousel", plugins_url() . '/erla-owlcarousel-simple/css/owl.carousel.min.css');
	wp_enqueue_style("owl.theme.default", plugins_url() . '/erla-owlcarousel-simple/css/owl.theme.default.min.css');
	wp_enqueue_style("eoc-main", plugins_url() . '/erla-owlcarousel-simple/css/eoc-simple.css');

	wp_enqueue_script('owl.carousel', plugins_url() . '/erla-owlcarousel-simple/js/owl.carousel.min.js', array('jquery'), "2.2.1", true);
	
}
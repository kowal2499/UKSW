<?php

	/*
	Plugin Name: erla OWLCarousel simple
	owlCarousel based slider
	Version: 1.0
	Author: Roman Kowalski
	Text Domain: erla-owlcarousel
	*/

// #########

require_once(plugin_dir_path(__FILE__) . '/includes/enqueue.php');
add_action('admin_enqueue_scripts', 'erla_owlcarousel_simple_admin_enq');
add_action('wp_enqueue_scripts', 'erla_owlcarousel_simple_enq');

require_once(plugin_dir_path(__FILE__) . '/includes/widget_class.php');

function erla_owlcarousel_simpe_load_widget() {
	register_widget('Erla_OWLCarousel_Simple');
}
 
add_action('widgets_init', 'erla_owlcarousel_simpe_load_widget');

// ####################################
// ##
// ## Register shortcode
// ##
// ####################################

function eoc_simple_func($atts) {

	global $wp_registered_widgets;

	// process attributes

	extract(shortcode_atts(array('id' => '1'), $atts));
	$instance = $id;
	$id = 'erla-owlcarousel-simple-' . $id;

	// echo widget
	if (!isset($wp_registered_widgets[$id])) return;

	require_once(plugin_dir_path(__FILE__) . '/includes/widget_frontend.php');
}

add_shortcode('eoc-simple','eoc_simple_func');
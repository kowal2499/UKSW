<?php
	function da_testimonies_create_posttype() {
		register_post_type('testimonies',
			array(
				'labels' => array(
					'name' => __('Świadectwa'),
					'singular_name' => __('Świadectwo')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail')
			)
		);
	}

	add_action('init', 'da_testimonies_create_posttype');
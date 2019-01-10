<?php

function rk_subpage_menu_func( $atts ) {
	global $post;


	$childrens = get_children(array('post_type' => 'page', 'post_parent' => $post->ID, 'post_status' => 'publish', 'order' => 'ASC'));
	
	$outputTxt = "";

	$outputTxt = "<ol>";
	foreach ($childrens as $key => $value) {
		$outputTxt .= "<li><a href='".get_permalink($value->ID)."'>";
		$outputTxt .= $value->post_title."<br>";
		$outputTxt .= "</a></li>";
	}
	$outputTxt .= "</ol>";

	return $outputTxt;
}

// ############################################################################

function rk_page_navigation_buttons ( $atts ) {
	global $post;
	$parent = wp_get_post_parent_id( $post->ID );
	$childrens = get_children(array('post_type' => 'page', 'post_parent' => $parent, 'post_status' => 'publish', 'order' => 'ASC'));

	// create children ids array
	$childrens_ids = array();
	foreach ($childrens as $key => $value) {
		$childrens_ids[] += $value->ID; 	
	}
	$current = array_search($post->ID, $childrens_ids);
	$prev_ID = -1;
	$next_ID = -1;

	if ($current > 0) {
		$prev_ID = $current - 1;
	}

	if ($current < (count($childrens_ids)-1)) {
		$next_ID = $current + 1;
	}

	$outputTxt = "";
	
	if (count(get_children(array('post_type' => 'page', 'post_parent' => $post->ID, 'post_status' => 'publish', 'order' => 'ASC'))) == 0) {
		
		
		$outputTxt .= "<hr><div class='row next-prev-menu'>";

		// button prev
		$outputTxt .= "<div class='col-md-4 text-center' style='margin: auto 0;'>";

				if ($prev_ID > -1) {
				
				$outputTxt .= "<a class='btn btn-default center-block btn-book' href='".get_permalink($childrens_ids[$prev_ID])."' role='button'>"."<span class='glyphicon glyphicon-menu-left' aria-hidden='true'></span>&nbsp;WSTECZ<br><span style='font-size: 11px;'></span></a>";
				$outputTxt .= "<p>".get_the_title($childrens_ids[$prev_ID])."</p>";
			} 
		$outputTxt .= "</div>";

	

		// button menu
		$outputTxt .= "<div class='col-md-4 text-center' style='margin: auto 0;'>";
				$outputTxt .= "<a class='btn btn-default center-block btn-book' href='".get_permalink($parent)."' role='button'>"."<span class='glyphicon glyphicon-menu-up' aria-hidden='true'></span></a>";
				$outputTxt .= "<p>Powrót do spisu treści</p>";
		$outputTxt .= "</div>";


		// button next
		$outputTxt .= "<div class='col-md-4 text-center' style='margin: auto 0;'>";
			if ($next_ID > -1) {
			
			$outputTxt .= "<a class='btn btn-default center-block btn-book' href='".get_permalink($childrens_ids[$next_ID])."' role='button'>"."DALEJ&nbsp;<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span><br><span style='font-size: 11px;'></span></a>";
			$outputTxt .= "<p>".get_the_title($childrens_ids[$next_ID])."</p>";
			
			}
		$outputTxt .= "</div>";
	

		$outputTxt .= "</div>";

	}
	return $outputTxt;

}

// ############################################################################

function rk_abc_header( $atts ) {
	global $post;

	$a = shortcode_atts( array (
			'title1' => '',
			'title2' => '',
			'title3' => ''
		), $atts);

	$outputTxt = "<div class='previous-content'>";
	$outputTxt .= '<h2 style="text-align: center;">Oto matka Twoja&nbsp;– 33 dniowe Rekolekcje maryjne</h2>';
	$outputTxt .= '<h3 style="text-align: center;">Rekolekcje Ofiarowania się Trójcy Przenajświętszej&nbsp;przez Niepokalane Serce Maryi</h3>';
	$outputTxt .= "</div>";
	$outputTxt .= '<hr>';
	$outputTxt .= '<h3 style="text-align: center">' . $a['title1'] . '</h3>';
	$outputTxt .= '<h2 style="text-align: center">' . $a['title2'] . '</h2>';
	$outputTxt .= '<h3 style="text-align: center">' . $a['title3'] . '</h3>';
	$outputTxt .= '<hr>';

	return $outputTxt;

}
<?php

function da_testimonies_load_styles() {
	wp_enqueue_style('owl.carousel', plugins_url('/da-testimonies/public/css/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', plugins_url('/da-testimonies/public/css/owl.theme.default.min.css'));
	 wp_enqueue_script('owl.carousel', plugins_url('/da-testimonies/public/js/owl.carousel.min.js'), array('jquery'), "2.2.1", true);
	 wp_enqueue_script('da-launcher', plugins_url('/da-testimonies/public/js/da-launcher.js'), array('jquery'), "1.0", true);
}


add_action('wp_enqueue_scripts', 'da_testimonies_load_styles');

// #############################

function da_testimonies_widget_content() {
	$loop = new WP_Query( array( 'post_type' => 'testimonies', 'posts_per_page' => -1 ) );

	if ($loop->have_posts()) :
		echo '<div id="da-owl" class="owl-carousel owl-theme">';

	 	while ( $loop->have_posts() ) : 
	 		$loop->the_post();
			?>

			<div class="item">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
					<span class="title"><?php the_title(); ?></span>
				</a>			
			</div>

			<?php
	 	endwhile; 
	 	echo '</div><!-- #da-owl -->';
	 	wp_reset_query();

	 endif;
}

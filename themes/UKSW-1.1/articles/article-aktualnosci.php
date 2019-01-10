<?php

	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

	$query_args = array (
		'post_type' => 'post',
		'posts_per_page' => 6,
		'paged'         => $paged,
		'orderby'	=>	'date',
		'order'	=>	'DESC'
	);

	$loop = new WP_Query ( $query_args );
	$counter = 0;
	$sticky_class = "";
	echo "<div class='row'>";

	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ): $loop->the_post();

		if (!($counter % 2) && ($counter)) {
			echo "</div><!-- .row -->";
			echo "<div class='row'>";
		}
		
?>

		<div class="col-md-6">
			<!-- <a href='<?php the_permalink(); ?>'> -->

			<?php 
				if (is_sticky()) {
					$sticky_class = "sticky";
				} else {
					$sticky_class = "";
				}
			?>

				<div class="content <?php echo $sticky_class; ?>">
					<span class="aktualnosci-header">
						<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>

						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
						<?php echo get_the_date(); ?>

						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<?php echo get_the_author(); ?>

						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
						<?php echo get_comments_number(); ?>



					</span>
					<h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4>
					<!-- <div class="image" style="background: url('<?php the_post_thumbnail_url(); ?>');"></div> -->
					<!-- <div class="excerpt"><?php the_excerpt(); ?></div> -->
				</div>
			<!-- </a> -->
	
		</div>

		
<?php
		$counter=$counter+1;
	
		endwhile;

		echo "</div>";

		// paginacja dla aktualności
		if (function_exists(custom_pagination)) {
			echo "<div class='row'><!-- for pagination control -->";
        		custom_pagination($loop->max_num_pages, "", $paged);
        	echo "</div><!-- pagination control ends -->";
        }

	else {
			echo "Brak aktualności.";
	}
	endif;

?>
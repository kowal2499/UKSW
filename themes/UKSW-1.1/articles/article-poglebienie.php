<?php
	$query_args = array (
		'post_type' => 'poglebienie',
		'orderby'	=>	'date',
		'order'	=>	'DESC'
	);

	$loop = new WP_Query ( $query_args );
	$postsNumber = $loop->post_count;
	
	$counter = 0;
	$colors = array('color-orange', 'color-red', 'color-blue');
	$color_id = 0;

	$classString = "col-md-4";
	echo "<div class='row'>";
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ): $loop->the_post();

		// Add a new row before 2th, 4th, 6th, etc.. element
		if (!($counter % 3) && ($counter)) {
			echo "</div><!-- .row -->";
			echo "<div class='row'>";

			// Add appropriate margin if there are less than 2 elements in last row
			if ($postsNumber - $counter == 1) {
				$classString = "col-md-offset-3 col-md-6";
			}
		}	

		
?>
	

		<div class="<?php echo $classString; ?>" style="text-align: center;">
			<a href='<?php echo get_permalink(get_post_meta(get_the_ID(), 'link_do_strony', true));?>'>
				<div class="img-container">

					<img src='<?php 
					$img_url = wp_get_attachment_url(get_post_meta(get_the_ID(), "obrazek", true));
			echo $img_url;
			?>'>
					<div class="hover-background <?php echo $colors[$color_id]; ?>"></div>
					<h2 class="<?php echo $colors[$color_id]; ?>"><?php the_title(); ?></h2>

		
				</div>
			</a>
		</div>


<?php
			$counter = $counter+1;
			$color_id = $color_id+1;
?>
		
<?php
		endwhile;
	echo "</div>";
	else:
			echo "Brak zdefiniowanych pogłębień.";
	endif;

?>
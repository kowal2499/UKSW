<?php
	$query_args = array (
		'post_type' => 'diakonie',
		'orderby'	=>	'date',
		'order'	=>	'DESC'
	);

	$loop = new WP_Query ( $query_args );
	$postsNumber = $loop->post_count;
	
	$counter = 0;
	$classString = "col-md-6";
	echo "<div class='row'>";
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ): $loop->the_post();

		// Add a new row before 2th, 4th, 6th, etc.. element
		if (!($counter % 2) && ($counter)) {
			echo "</div><!-- .row -->";
			echo "<div class='row'>";

			// Add appropriate margin if there are less than 2 elements in last row
			if ($postsNumber - $counter == 1) {
				$classString = "col-md-offset-3 col-md-6";
			}
		}	
?>
		<div class="<?php echo $classString; ?>">
			<a href='<?php the_permalink(); ?>'>
				<div class="content">
					<h2><?php the_title(); ?></h2>
					<div class="image-wrapper">
					<div class="image" style="background: url('<?php the_post_thumbnail_url(); ?>');"></div>
					</div>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				</div>
			</a>
		</div>
<?php
			$counter = $counter+1;
?>
		
<?php
		endwhile;
	echo "</div>";
	else:
			echo "Brak zdefiniowanych diakonii.";
	endif;

?>
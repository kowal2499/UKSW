<?php

	$query_args = array (
		'post_type' => array('post', 'wydarzenia'),
		'posts_per_page' => 6,
		'orderby'	=>	'comment_count',
		'post_status' => 'publish',
		'caller_get_posts'=> 1,
		'order'	=>	'DESC'
	);

	$loop = new WP_Query ( $query_args );

	echo "<div class='row'>";

	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ): $loop->the_post();
			$number_of_comments = get_comments_number();
			if (!$number_of_comments) {
				break;
			}
?>
			<div class="row">
			
				<div class="content">
					<h5>
					<a href='<?php echo the_permalink()."#comments"; ?>'>
						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span><?php echo "&nbsp;".$number_of_comments; ?>
					</a>
					&nbsp;
					<a href='<?php the_permalink(); ?>'>
						<?php the_title(); ?>
					</a>
					</h5>
					
				</div>
			
			</div>

<?php

		endwhile;
	endif;


	echo "</div>";
?>	
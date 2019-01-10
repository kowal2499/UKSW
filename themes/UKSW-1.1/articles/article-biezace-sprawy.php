<?php

	$query_args = array (
		'post_type' => 'post',
		'posts_per_page' => -1,
		'orderby'	=>	'date',
		'order'	=>	'DESC'
	);

	$loop = new WP_Query ( $query_args );

	if ( $loop->have_posts() ) :
?> 
		<article id="current-issues">
		<h1>Aktualności</h1>
		<ul> 

<?php
		while ( $loop->have_posts() ): $loop->the_post();

?>

			<li>
				<a href='<?php the_permalink(); ?>'>
					<?php the_post_thumbnail('thumbnail'); ?>
					<span class="issue-title"><?php the_title(); ?></span>
					
				</a>

			</li>
<?php
	
		endwhile;
?> </ul> <?php
	// else:
		// echo "brak postów";
	
	endif;

	


?>

</article>
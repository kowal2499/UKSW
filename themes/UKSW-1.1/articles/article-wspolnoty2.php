<?php
	$query_args = array (
		'post_type' => 'wspolnoty',
		'orderby'	=>	'date',
		'order'	=>	'ASC'
	);

	$loop = new WP_Query ( $query_args );
	$postsNumber = $loop->post_count;
	
    $counter = 0;
    $directionClass = "right";
    $bckgPostition = "background-position: left top;";

?>
    <div class="row">
        <div class="col-md-12">
<?php

	if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ): $loop->the_post();	
        
        if ($counter % 2) {
            $directionClass = "left";
            $bckgPostition = "background-position: right top;";
        } else {
            $directionClass = "right";
            $bckgPostition = "background-position: left top;";
        }
?>
		<div class="wspolnota" style="background-image: url('<?php echo get_post_meta(get_the_ID(), 'wspolnota_tlo', true);?>'); <?php echo $bckgPostition; ?>">
            <div class="desc <?php echo $directionClass; ?>">
                <a href='<?php the_permalink(); ?>'>
                    <?php the_post_thumbnail( array(100, 100), array( 'class' => 'center-block img-circle' )); ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="lead"><?php the_excerpt(); ?></div>               
                </a>
            </div>
		</div><!-- wspolnota -->

		<?php
			$counter = $counter+1;
		?>		
<?php
        endwhile;
    else:
			echo "Brak zdefiniowanych wspólnot.";
	endif;
?>
        </div><!-- col -->
    </div><!-- row -->
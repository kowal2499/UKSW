
<?php
	$query_args = array (
		'post_type' => 'wydarzenia',
		'meta_key'	=> 'start',
		'orderby'	=> 'meta_value_num',
		'posts_per_page' => -1,
		'order'	=>	'ASC'
	);

	$loop = new WP_Query ( $query_args );
	$eventsLimit = 5;
	$eventsDisplayed = 0;
	$opuszczono = 0;
	$jump_ID = 0;
	
	if ( $loop->have_posts() ) :
		$i = 0;
		while ( $loop->have_posts() ): $loop->the_post();
			$i += 1;
			
			// jeśli osiągnięto limit pokazanych wydarzeń to przerwij pętlę
			if ($eventsDisplayed == $eventsLimit) {
				break;
			}
	
			$start = get_field("start");
			$start_date = date_create($start);

			// jeśli wydarzenie już wystąpiło to je pomiń
			$today = date("Ymd");
			if ($today > $start) {
				$opuszczono += 1;
				continue;
			} else if ($jump_ID == 0) {
				$jump_ID = get_the_ID();
			}

			$end = get_field("koniec");
			$retValue = "";

			// specjalne formatowanie jeśli mamy określoną datę zakończenia
			if ($end) {
				$end_date = date_create($end);
				$retValue = date_format($start_date,"d/m/Y")." - ".date_format($end_date,"d/m/Y");
			} else {
			// formatowanie tylko dla daty rozpoczęcia
				$retValue = date_format($start_date,"d/m/Y");
			}

?>
		<div class="row">
				<div class="content">
					<a href='<?php the_permalink(); ?>'>
									
						<h5 class="event-date">
							<?php echo $retValue; ?>	
						</h5>
					
						<div class="row">
							<?php if (has_post_thumbnail()) { ?>
								<div class="col-md-4">
									<img src='<?php the_post_thumbnail_url("medium"); ?>' >
								</div>
							<?php } ?>
							

							<div class="col-md-8">
								<h5 class="title"><?php the_title(); ?></h5>
							</div>
						</div>
					</a>
				</div>
		</div>

		
<?php
			$eventsDisplayed = $eventsDisplayed + 1;
		endwhile;
		
	else:
			echo "Brak wydarzeń w najbliższym czasie.";
	endif;

?>
<p>

	<?php
		// calculate the appropriate page number for 'all events' page
		$page_number = $opuszczono / 12;

		if ($page_number <= 1) {
			$page_number = 1;
		} else {
			$page_number = ceil($page_number);
		}
	?>

	<a class="btn btn-default center-block" href="<?php echo get_page_link(90). "page/$page_number/#$jump_ID"; ?>" role="button">
		Pełny harmonogram wydarzeń &nbsp;&nbsp; <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> 
	</a>

</p>
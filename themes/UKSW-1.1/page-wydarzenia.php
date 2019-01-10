<?php
/*
    Template name: Wszystkie wydarzenia
*/
get_header(); ?>

	<div class="single-page">
	
			<div class="row extra-margin">

				<div class="col-md-8 backstage-pattern" id="page-all-events">
					<article>
						<div class="post-content">
							<h1>KALENDARIUM DUSZPASTERSTWA AKADEMICKIEGO UKSW</h1>

						<?php
// custom loop for the custom type

							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							
							$query_args = array (
								'posts_per_page' => 12,
								'paged'         => $paged,
								'post_type' => 'wydarzenia',
								'meta_key'	=> 'start',
								'orderby'	=> 'meta_value_num',
								'order'	=>	'ASC'
							);

							$loop = new WP_Query ( $query_args );
							$postsNumber = $loop->post_count;
							
							if ( $loop->have_posts() ) :
								while ( $loop->have_posts() ): $loop->the_post();
							
						?>
								<div class="row no-margin">
									
										<div class="content no-margin">
											
											<h5>
												<div class="event-date" id="<?php echo get_the_ID();?>">
												<?php
													$start = get_field("start");
													$start_date = date_create($start);
											
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
													echo $retValue;  
												?>
												</div>
												<div class="event-title"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></div>
											</h5>


											<div class="calendar-excerpt">
											<a href='<?php the_permalink(); ?>' >
												

												

													<?php
														$margin = ""; 
														if (has_post_thumbnail()) { 
													?>
													<div class="col-md-3 image no-margin center-block">
														<img src='<?php the_post_thumbnail_url( ); ?>' >
													</div>

													<?php } ?>
													<div class="<?php echo $margin; ?> col-md-9 no-margin ">
														<div class="row no-margin"><?php the_excerpt(); ?></div>
													</div>
										
											</a>
											</div>

											
										</div>
									
								</div>

								
						<?php
								endwhile;
							else:
									echo "Brak wydarzeń w harmonogramie.";
							endif;


						?>
						
					</div>

					<?php
						// paginacja dla aktualności
						if (function_exists(custom_pagination)) {
							echo "<div class='row'><!-- for pagination control -->";
				        		custom_pagination($loop->max_num_pages, "", $paged);
				        	echo "</div><!-- pagination control ends -->";
				        }
        			?>

					</article>
				</div><!-- class -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
		
		
	</div>


<?php get_footer(); ?>
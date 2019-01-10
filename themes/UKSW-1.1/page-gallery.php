<?php
/*
    Template name: Gallery
*/
get_header(); ?>

			<div class="row">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>
							<div class="post-content">
								<h1>Galeria</h1>

								<?php 
									
									$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

									$query_args = array (
										'post_type' => 'galeria',
										'posts_per_page' => 8,
										'paged'         => $paged,
									);
									$loop = new WP_Query ( $query_args );
									
									if ( $loop->have_posts() ) :
										while ( $loop->have_posts() ): $loop->the_post();
								?>

											<div class="row thumb-description" style="min-height: 120px;">
												<div class="col-md-3">
													<a href="<?php echo esc_url(the_permalink()); ?>">
														<?php echo esc_url(the_post_thumbnail('post-thumbnail', array("class"=>"img-thumbnail"))); ?>
													</a>
												</div>
												<div class="col-md-7">
													<p class="date"><?php echo get_post_meta(get_the_ID(), 'czas_wydarzenia', true); ?></p>
													<a href="<?php echo esc_url(the_permalink()); ?>"><div class="title"><?php echo the_title(); ?></div></a>
												</div>


											</div>
											<hr>
											

								<?php
										endwhile;
									endif;
								?>
 <?php posts_nav_link(); ?>
								<?php

									// paginacja dla aktualności
									if (function_exists(custom_pagination)) {
										echo "<div class='row'><!-- for pagination control -->";
							      custom_pagination($loop->max_num_pages, "", $paged);
							      echo "</div><!-- pagination control ends -->";
							  	}
        				?>
								
							</div>

						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
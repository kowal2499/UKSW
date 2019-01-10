<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UKSW-szablon
 */

get_header(); ?>
	
			<div class="row">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>
							<div class="post-content">
							<?php while ( have_posts() ) : the_post(); ?>

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


								?>


								<h2><?php echo $retValue; ?></h2>
								<h1><?php the_title(); ?></h1>
								<?php the_post_thumbnail('medium', array('class' => 'center-block')); ?>
								<p><?php the_content(); ?></p>

<?php

								// if ( comments_open() || get_comments_number() ) :
								// 		comments_template();
								// endif;
?>
								
							<?php endwhile; ?>
							</div>
						</article>
					</section>

					<?php if ( get_edit_post_link() ) : ?>
						
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'uksw-szablon' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						
					<?php endif; ?>


				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
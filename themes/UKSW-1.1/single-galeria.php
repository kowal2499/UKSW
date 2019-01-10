<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UKSW-szablon
 */

get_header(); ?>
	

		<div id="page_single_gallery">
			<div class="row extra-margin">

				<div class="col-md-8 backstage-pattern" >
					<section>
						<article>
							<div class="post-content">

								<ol class="breadcrumb">
									<li><a href=<?php echo get_home_url(); ?>>Strona Główna</a></li>
									<li><a href=<?php echo esc_url( get_permalink( get_page_by_title( 'Galeria' ) ) ); ?>>Galeria</a></li>
								</ol>


								<div class="simple-lightbox">
								<?php while ( have_posts() ) : the_post(); ?>
									<h1><?php the_title(); ?></h1>
									<p class="lead text-center"><?php echo get_post_meta(get_the_ID(), 'czas_wydarzenia', true); ?></p>
									<?php the_content(); ?>
								<?php endwhile; ?>
								</div>
								<hr>
								<div class="row gallery-buttons">

										<?php if (!empty(get_next_post())) : ?>
											<div class="button-prev">
												<a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>" class="btn btn-default">
												<div class="navigation-desc"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> następna galeria</div>
												<div class="navigation-title"><?php echo get_next_post()->post_title; ?></div>
												</a>
											</div>
										<?php endif; ?>

										<?php if (!empty(get_previous_post())) : ?>
											
											<div class="button-next">
												<a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>" class="btn btn-default">
												<div class="navigation-desc">wcześniejsza galeria <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
												<div class="navigation-title"><?php echo get_previous_post()->post_title; ?></div>
												</a>
											</div>
										<?php endif; ?>
									
										
										

										<div style="clear: both;"></div>
										
								</div>
								<hr>
								
								<ol class="breadcrumb">
									<li><a href=<?php echo get_home_url(); ?>>Strona Główna</a></li>
									<li><a href=<?php echo esc_url( get_permalink( get_page_by_title( 'Galeria' ) ) ); ?>>Galeria</a></li>
								</ol>

							</div>
						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div>
	</div><!-- container -->


<?php get_footer(); ?>
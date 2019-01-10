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
								<h1><?php the_title(); ?></h1>
								<?php #the_post_thumbnail(); ?>
								<p class="post-content"><?php the_content(); ?></p>
								<hr>
								<p>miejsce spotkań: <strong><?php echo get_post_meta(get_the_ID(), 'miejsce_spotkan', true); ?></strong></p>
								<p>termin spotkań: <strong><?php echo get_post_meta(get_the_ID(), 'termin_spotkan', true); ?></strong></p>
							<?php endwhile; ?>
							</div>

						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
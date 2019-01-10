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
									<p><?php the_content(); ?></p>
								<?php endwhile; ?>
							</div>

						</article>
					</section>
				</div><!-- class -->

				<?php get_sidebar(); ?>


			</div><!-- row -->
		</div><!-- container -->
		


<?php get_footer(); ?>
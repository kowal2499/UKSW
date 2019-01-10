<?php
/*
    Template name: youTube
*/
get_header(); ?>

			<div class="row">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>
							<div class="post-content">

								<h1>YouTube</h1>

								<?php
								while ( have_posts() ) : the_post();

									the_content( sprintf(
										/* translators: %s: Name of current post. */
										wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'uksw-szablon' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );

								endwhile; // End of the loop.
								?>
								
							</div>

						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
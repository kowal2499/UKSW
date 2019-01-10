<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package UKSW-szablon
 */

get_header(); ?>

	
		<div class="container">
			<div class="row extra-margin">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>
							<div class="post-content">

							<br>
							<div class="alert alert-danger" role="alert">
								
								<h2>Błąd nr 404</h2>

								<p>Nie można odnaleźć strony której adres został podany. Możliwe, że adres zawiera literówkę, lub dana strona została usunięta z naszego serwera.</p>

								<div style="text-align: center; margin-top: 10px;">
									<a href="<?php echo get_home_url(); ?>" class="btn btn-default btn-sm" role="button">
										Powrót do strony głównej
									</a>
									
								</div>
							</div>
							
							</div>
						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->

<?php
get_footer();

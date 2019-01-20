<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UKSW-szablon
 */

require_once 'classes/helpers.php';

get_header(); ?>

			<div class="row">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>

                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                        $imageLarge = '';
                                        if ($image = get_the_post_thumbnail_url()) {
                                            $imageLarge = get_the_post_thumbnail_url(null, 'full');
                                        } else {
                                            $image = $imageLarge = getDummyPictureUrl();
                                        }
                                    ?>

                                    <a href="<?php echo $imageLarge; ?>" class="js-lightbox">
                                        <img class="img-responsive" src="<?php echo $image; ?>" alt="Kliknij obrazek żeby powiększyć">
                                    </a>

                                </div>

                                <div class="col-md-8">
                                    <div class="post-content">
                                        <?php while (have_posts()): the_post(); ?>
                                            <h1><?php the_title(); ?></h1>
                                            <p><?php the_content(); ?></p>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                            </div>
						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
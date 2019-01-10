<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKSW-szablon
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4" >
	<aside id="secondary" class="widget-area" role="complementary">

			<div class="row">
					<?php include("articles/article-biezace-sprawy.php"); ?>
			</div>


			<div class="row">
				<article id="wydarzenia">
					<h1>Najbliższe Wydarzenia</h1>
					<?php include("articles/article-wydarzenia.php"); ?>
				</article>
			</div>

			<div class="row">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>

		
	</aside><!-- #secondary -->
</div>
</div>

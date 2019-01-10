<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKSW-szablon
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>&nbsp;2017 Duszpasterstwo Akademickie<br>Uniwersytet Kardynała Stefana Wyszyńskiego 
w Warszawie
				
			</div>

			<div class="col-md-4">
				<a href="http://erla.pl" target="_blank">
					<p style="font-size: 0.8em; margin-bottom: 0px;">projekt &amp; realizacja</p>
					<img src='<?php echo get_template_directory_uri(); ?>/assets/imgs/erla-logo.png'>
				</a>
			</div>
				
		</div>
	</div>	
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

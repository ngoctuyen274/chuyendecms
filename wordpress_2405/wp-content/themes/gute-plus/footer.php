<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Space_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<?php if (is_active_sidebar( 'footer-widget' )): ?>
		<div class="footer-middle space-padding bg-dark">
			<div class="container">
				<div class="row">
					<?php 
						dynamic_sidebar('footer-widget');
					 ?>
				</div>
			</div>
		</div>
	<?php
	 endif; 
	 do_action('gute_plus_footerb');
	 ?>
		
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

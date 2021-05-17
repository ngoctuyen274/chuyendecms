<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gute 
 */
$gute_theme = wp_get_theme();
$gute_domain = $gute_theme->get( 'TextDomain' );

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
	<?php endif; ?>
		<div class="footer-bottom">
			<div class="container">
			<?php if ( has_nav_menu( 'footer-menu' ) ): ?>
				<div class="row">
					<div class="col-md-6">
				<?php do_action( 'gute_footer_copyright', $gute_domain ); ?>
					</div><!-- .footer-copyright -->
					<div class="col-md-6">
						<div class="footer-menu text-right">
							<?php
							wp_nav_menu( array(
							    'theme_location' => 'footer-menu', // Defined when registering the menu
							    'container'      => false,
							    'menu_class'     => 'footer-nav',
							    'fallback_cb'     => '__return_false',
							        ) );
							        ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="text-center">
				<?php do_action( 'gute_footer_copyright', $gute_domain ); ?>
				</div>
			<?php endif; ?>

			</div>
		
		</div>
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php 
/*
*
* Extra Hook for gute WordPress Theme
*
*
*/

function gute_footer_copyright_text($gute_domain){
?>
	<div class="footer-copyright">&copy;
		<?php
			echo date_i18n(
				/* translators: Copyright date format, see https://secure.php.net/date */
				_x( 'Y', 'copyright date format', 'gute' )
			);
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?></a>
							<span class="sep"> | </span>
		<a href="<?php echo esc_url( __( 'https://wpthemespace.com/product/'.$gute_domain, 'gute' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Powered by %s', 'gute' ), wp_get_theme().' WordPress Theme' );
				?></a>
	</div><!-- .site-info -->


<?php
}
add_action( 'gute_footer_copyright', 'gute_footer_copyright_text' );
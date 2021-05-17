<?php 
/* 
*
* Gute Plus theme footer action
*
*/

function gute_plus_footertext(){
	?>
		<div class="footer-bottom">
			<div class="baby-container site-info text-center">
				<div class="container">
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'WordPress Theme: %1$s Develop by %2$s', 'gute-plus' ), 'Gute Plus', '<a href="'.esc_url('https://wpthemespace.com/product/gute-plus').'">wpthemespace.com</a>' );
				?>
				</div>
			</div><!-- .site-info -->
		</div>
	<?php
}
add_action('gute_plus_footerb','gute_plus_footertext');
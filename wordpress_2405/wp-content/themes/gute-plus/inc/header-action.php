<?php 
/*
*
* header output for gute plus theme
*
*/

function gute_plus_header_output(){
?>
<header id="masthead" class="site-header">
		<?php 
			$gute_plus_topbar_show = get_theme_mod( 'gute_plus_topbar_show', 1 );
		?>
			<?php
			  if($gute_plus_topbar_show){
			  	do_action('gute_plus_topbar');
			  } 
			?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="site-branding">
						<div class="site-logo text-center">
							<?php
							if(has_custom_logo()):
								the_custom_logo();
							else:
								?>
								<h1 class="site-title-text"><a class="text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
								<?php
							
							 
							 endif; ?>
							 <?php
						$news_box_description = get_bloginfo( 'description', 'display' );
						if ( $news_box_description || is_customize_preview() ) :
								?>
							<p class="site-description"><?php echo esc_html($news_box_description); ?></p>
						<?php endif; ?>
						</div>
					</div><!-- .site-branding -->
				</div>
			</div>
		</div>
				<div class="main-nav bg-dark">
					<div class="container">

						<nav class="navbar navbar-expand-lg main-menu text-center">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'gute-plus' ); ?>">
						        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
						    </button>
						    <div class="collapse navbar-collapse" id="navbar-content">
						        <?php
						        wp_nav_menu( array(
						            'theme_location' => 'menu-1', // Defined when registering the menu
						            'menu_id'        => 'primary-menu',
						            'container'      => false,
						            'depth'          => 2,
						            'menu_class'     => 'navbar-nav ml-auto',
						            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						            'walker'         => new WP_Bootstrap_Navwalker()
						        ) );
						        ?>
						    </div>
						</nav>	
					</div>
				</div>
	</header>
<?php
}
add_action( 'gute_plus_header', 'gute_plus_header_output' );

function gute_plus_topbar_output(){
	$gute_plus_top_address = get_theme_mod( 'gute_plus_top_address', esc_html__('Welcome','gute-plus') );

?>
	<div class="gute-topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="top-time">
					<?php echo esc_html( $gute_plus_top_address ); ?>
					</div>
				</div>
				<div class="col-md-7">
					<div class="topbar-menu text-right">
						<nav id="top-navigation" class="top-navigation">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'top_menu',
											'menu_id'        => 'top-menu',
											'menu_class'        => 'top-container',
											'fallback_cb'     => '__return_false',
										) );
									?>
									
									
						</nav><!-- #site-navigation -->	
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action( 'gute_plus_topbar', 'gute_plus_topbar_output' );
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gute
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if( function_exists( 'wp_body_open' ) ){
 	wp_body_open();
}

  ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gute' ); ?></a>

	<header id="masthead" class="site-header text-light shadow-sm">
		<div class="container-fluid pl-5 pr-5">
			<div class="d-flex">
				<div class="align-self-start">
					<div class="site-branding">
						<?php
						if(has_custom_logo()):
							the_custom_logo();
						else:
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></p>
							<?php
						endif;
						$gute_description = get_bloginfo( 'description', 'display' );
						if ( $gute_description || is_customize_preview() ) :
							?>
							<p class="site-description d-none"><?php echo esc_html($gute_description); /* WPCS: xss ok. */ ?></p>
						<?php
						 endif;
						 endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="align-self-end flex-grow-1">
						<nav class="navbar navbar-expand-lg">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'gute' ); ?>">
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
					<div class="align-self-start">
						<div class="header-search">
							<div class="search-icon"><i class="fa fa-search"></i></div>
							<div class="header-search-form shadow-lg">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
			</div>
		</div>

	</header><!-- #masthead style="background: url(http://localhost/easy/wp-content/uploads/2018/07/bg3.jpg) -->
	<?php if (is_home()): 

		$home_text = get_theme_mod('home_text','' );
		$gute_banner_text_align = get_theme_mod('gute_banner_text_align','center' );
		$home_subtext = get_theme_mod('home_subtext', '');
		$btn_text_one = get_theme_mod('btn_text_one','');
		$btn_url_one = get_theme_mod('btn_url_one','' );
		$btn_text_two = get_theme_mod('btn_text_two','' );
		$btn_url_two = get_theme_mod('btn_url_two','' );
		$gute_header_img_show = get_theme_mod('gute_header_img_show', 1 );
		$gute_headerimg_overlay = get_theme_mod('gute_headerimg_overlay', 1 );
	if( $gute_header_img_show == 1 && has_header_image() ):
	?>
	<section class="home-banner">
		<?php
	 	the_header_image_tag();	
	 	?>
<?php if($gute_headerimg_overlay): ?>
	 	<div class="overlay-text"></div>
<?php endif; ?>

		<div class="banner-text text-<?php echo esc_attr($gute_banner_text_align); ?>">
			<div class="container">
				<h1 id="hometitle" class="text-light"><?php echo esc_html($home_text); ?></h1>
				<h3 id="homesubtitle" class="text-white"><?php echo esc_html($home_subtext); ?> 
				</h3>
				<?php if($btn_text_one ): ?>
				<a id="btnone" href="<?php echo esc_url($btn_url_one); ?>" class="btn-two btn btn-outline-light shadow-lg"><?php echo esc_html($btn_text_one); ?></a>
			<?php endif;
				if ($btn_text_two):
			 ?>
				<a id="btntwo" href="<?php echo esc_url($btn_url_two); ?>" class="btn-two btn btn-outline-light shadow-lg"><?php echo esc_html($btn_text_two); ?></a>
			<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php endif; ?>
	<div id="content" class="site-content">

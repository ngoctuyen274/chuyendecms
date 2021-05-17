<?php 
/*This file is part of gute child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
function gute_plus_fonts_url() {
	$fonts_url = '';

		$font_families = array();

		$font_families[] = 'Roboto:400,600';
		$font_families[] = 'Noto Sans:400,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return esc_url_raw( $fonts_url );
}

add_action( 'after_setup_theme', 'gute_plus_register_nav_menus' );
function gute_plus_register_nav_menus() {
	register_nav_menus( array(
		'top_menu' => esc_html__('Top bar menu', 'gute-plus')
	) );
}

add_action( 'after_setup_theme', 'gute_plus_remove_footer_menu', 20 );
function gute_plus_remove_footer_menu() {
	unregister_nav_menu( 'footer-menu' );
}

function gute_plus_enqueue_child_styles() {
	wp_enqueue_style( 'gute-plus-font', gute_plus_fonts_url(), array(), null );
	wp_enqueue_style( 'gute-plus-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','font-awesome','gute-default'), '', 'all');
   wp_enqueue_style( 'gute-plus-main',get_stylesheet_directory_uri() . '/assets/css/main.css', array(),'1.0.2','all');
  
}
add_action( 'wp_enqueue_scripts', 'gute_plus_enqueue_child_styles');


/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';
/*
*
* header & footer action
*/
require get_stylesheet_directory() . '/inc/header-action.php';
require get_stylesheet_directory() . '/inc/footer-action.php';


/**
 * Add inline css 
 *
 * 
 */
if ( ! function_exists( 'guteplus_header_inline_css' ) ) :
function guteplus_header_inline_css() {
    
 $gute_plus_headerbg_color = get_theme_mod('gute_plus_headerbg_color','#fff');

    
    $style = '';
    if( $gute_plus_headerbg_color != '#fff'){
        $style .= '.site-header{background-color:'.esc_attr($gute_plus_headerbg_color).';}';
    }

        wp_add_inline_style( 'gute-plus-main', $style );
}
add_action( 'wp_enqueue_scripts', 'guteplus_header_inline_css' );
endif;

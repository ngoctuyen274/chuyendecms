<?php
/**
 * Add inline css 
 *
 * 
 */
if ( ! function_exists( 'gute_inline_css' ) ) :
function gute_inline_css() {
    
        $style = '';

  $banner_textcolor = get_theme_mod('banner_textcolor');
         if($banner_textcolor){ 
            $style .= '.banner-text h1#hometitle,.banner-text h3#homesubtitle,.banner-text a#btnone,.banner-text a#btntwo{
                    color: '.esc_attr($banner_textcolor).';
                }';
         }
 $banner_btn_bgcolor = get_theme_mod('banner_btn_bgcolor');
         if($banner_btn_bgcolor){ 
            $style .= '.banner-text a#btnone,.banner-text a#btntwo{
                    background: '.esc_attr($banner_btn_bgcolor).';
                }';
         }


   
        wp_add_inline_style( 'gute-style', $style );
}
add_action( 'wp_enqueue_scripts', 'gute_inline_css' );
endif;
<?php
/**
 * Gute plus Theme Customizer
 *
 * @package gute
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gute_plus_sanitize_post_grid($value){ 
    if(!in_array($value, array('grid','list','standard'))){
        $value = 'standard';
    }
    return $value;
}
function gute_plus_sanitize_header_text_align($value){ 
    if(!in_array($value, array('left','center','right'))){
        $value = 'left';
    }
    return $value;
}

function gute_plus_customize_register( $wp_customize ) {

	$wp_customize->remove_control( 'gute_post_control' );
    $wp_customize->remove_control( 'gute_banner_text_align_control' );
    $wp_customize->remove_control( 'gute_header_img_show_control' );

            // Add setting
    $wp_customize->add_setting('gute_plus_headerbg_color', array(
        'default' => '#fff',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'gute_plus_headerbg_color', array(
                'label' => __('Header background color','gute-plus'),
                'section' => 'colors',
            )
        )
    );

    $wp_customize->add_section('gute_plus_topbar_section', array(
        'title' => esc_html__('Top bar settings', 'gute-plus'),
        'capability'     => 'edit_theme_options',
        'priority'       => 5,

    ));
     $wp_customize->add_setting('gute_plus_topbar_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  1,
        'sanitize_callback' => 'absint',
         'transport' => 'refresh',

    ));
    $wp_customize->add_control('gute_plus_topbar_show_control', array(
        'label'      => esc_html__('Display header Topbar', 'gute-plus'),
        'section'    => 'gute_plus_topbar_section',
        'settings'   => 'gute_plus_topbar_show',
        'type'       => 'checkbox',
    ));
    $wp_customize->add_setting('gute_plus_top_address', array(
        'default'        => esc_html__('Welcome','gute-plus'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gute_plus_top_address_control', array(
        'label'      => esc_html__('Top bar text', 'gute-plus'),
        'description'     => esc_html__('Enter top bar text here.', 'gute-plus'),
        'section'    => 'gute_plus_topbar_section',
        'settings'   => 'gute_plus_top_address',
        'type'       => 'text',
    ));
     $wp_customize->add_setting('gute_header_img_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
         'transport' => 'refresh',

    ));
    $wp_customize->add_control('gute_header_img_show_control', array(
        'label'      => esc_html__('Display header banner', 'gute-plus'),
        'section'    => 'header_image',
        'settings'   => 'gute_header_img_show',
        'type'       => 'checkbox',
    ));

     $wp_customize->add_setting('gute_post_view', array(
        'default'       => 'standard',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'gute_plus_sanitize_post_grid',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gute_post_control', array(
        'label'      => esc_html__('Post view style', 'gute-plus'),
        'section'    => 'gute_post_section',
        'settings'   => 'gute_post_view',
        'type'       => 'select',
        'choices'    => array(
            'standard' => esc_html__('Standard view', 'gute-plus'),
            'grid' => esc_html__('Grid view', 'gute-plus'),
            'list' => esc_html__('List view', 'gute-plus'),
        ),
    ));
     $wp_customize->add_setting('gute_banner_text_align', array(
        'default'       => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'gute_plus_sanitize_header_text_align',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gute_plus_title_control', array(
        'label'      => esc_html__('Header text position', 'gute-plus'),
        'section'    => 'header_image',
        'settings'   => 'gute_banner_text_align',
        'type'       => 'select',
        'choices'    => array(
            'left' => esc_html__('Text Left', 'gute-plus'),
            'center' => esc_html__('Text Center', 'gute-plus'),
            'right' => esc_html__('Text Right', 'gute-plus'),
        ),
        'active_callback' => 'gute_banner_show_hide',

    ));

}
add_action( 'customize_register', 'gute_plus_customize_register',99 );

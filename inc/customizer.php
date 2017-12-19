<?php
/**
 * Slightly Theme Customizer
 *
 * @package slightly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function slightly_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel         = 'slightly_header_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->get_section( 'title_tagline' )->title        = __('Site branding', 'slightly');
    
    $wp_customize->add_setting('bodytext_color', array(
     'default'        => '#404040',
        'type'        => 'theme_mod',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bodytext_color', array(
        'label'   => 'Body Text Color',
        'section' => 'colors',
        'settings'   => 'bodytext_color'
    )));
    
    $wp_customize->add_section( 'posts-arrangement' , array(
        'title' =>  'Posts Arrangement',
    ) );


    $wp_customize->add_setting( 'posts-grid', array(
        'default' => 'arrangement-list',
        'type' => 'theme_mod'
    ) );

    $wp_customize->add_control( 'posts-grid', array(
        'label'      => 'Choose a post arrangement',
        'section'    => 'posts-arrangement',
        'settings'   => 'posts-grid',
        'type'       => 'radio',
        'choices'    => array(
            'arrangement-list'   => 'List',
            'arrangement-grid'  => 'Grid',
    ) ) );
    
}
add_action( 'customize_register', 'slightly_customize_register' );

function slightly_customize_colors() {
    $bodytext_color = get_theme_mod( 'bodytext_color' );

    ?>
    <style>
        body, button, input, select, textarea, a { 
            color:  <?php echo $bodytext_color; ?>; 
        }
    </style>

    <?php

}
add_action( 'wp_head', 'slightly_customize_colors' );

/**
 * Sanitize
 */
//Text
function slightly_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function slightly_customize_preview_js() {
	wp_enqueue_script( 'slightly_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'slightly_customize_preview_js' );
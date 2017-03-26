<?php
/**
 * Slightly Theme Customizer
 *
 * @package Slightly
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

    //___Header area___//
    $wp_customize->add_panel( 'slightly_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Text and Image', 'slightly'),
    ) );

    //___Header text___//
    $wp_customize->add_section(
        'slightly_header_text',
        array(
            'title'         => __('Header Text', 'slightly'),
            'priority'      => 14,
            'panel'         => 'slightly_header_panel', 
        )
    );    
    $wp_customize->add_setting(
        'header_text',
        array(
            'default' => 'Header Headline',
            'sanitize_callback' => 'slightly_sanitize_text',
            'transport'     => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'header_text',
        array(
            'label' => __( 'Header headline', 'slightly' ),
            'section' => 'slightly_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_subtext',
        array(
            'default' => 'Header Subheadline',
            'sanitize_callback' => 'slightly_sanitize_text',
            'transport'     => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'header_subtext',
        array(
            'label' => __( 'Header subheadline', 'slightly' ),
            'section' => 'slightly_header_text',
            'type' => 'textarea',
            'priority' => 10
        )
    );    
    $wp_customize->add_setting(
        'header_button',
        array(
            'default' => 'Button text',
            'sanitize_callback' => 'slightly_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_button',
        array(
            'label' => __( 'Button text', 'slightly' ),
            'section' => 'slightly_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_button_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'header_button_url',
        array(
            'label' => __( 'Button URL', 'slightly' ),
            'section' => 'slightly_header_text',
            'type' => 'text',
            'priority' => 11
        )
    );
    
}
add_action( 'customize_register', 'slightly_customize_register' );

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
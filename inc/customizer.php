<?php
/**
 * cn12_portfolio_timeline Theme Customizer
 *
 * @package cn12_portfolio_timeline
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cn12_portfolio_timeline_customize_register( $wp_customize ) {
    // echo '<pre>';
    // var_dump( $wp_customize );
    // echo '</pre>';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cn12_portfolio_timeline_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cn12_portfolio_timeline_customize_partial_blogdescription',
		) );
    }
    
    $my_theme_defaults = array(
        'picture' => get_template_directory_uri() . '/assets/img/avatar.png'
    );

	// About Picture
    $wp_customize->add_setting(
        'cn12_portfolio_timeline-about-picture',
        array(
            'default' => get_template_directory_uri() . '/assets/img/avatar.png'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'cn12_portfolio_timeline-about-picture',
            array(
                'label' => __('About Picture', 'cn12_portfolio_timeline'),
                'section' => 'title_tagline',
                'settings' => 'cn12_portfolio_timeline-about-picture',
                'context' => 'cn12_portfolio_timeline-abt-pic'
            )
        )
    );

    // About Name
    $wp_customize->add_setting(
        'cn12_portfolio_timeline-about-name',
        array(
            'default' => 'Your Name'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cn12_portfolio_timeline-about-name',
            array(
                'label' => __('Change Your Name', 'cn12_portfolio_timeline'),
                'section' => 'title_tagline',
                'settings' => 'cn12_portfolio_timeline-about-name',
                'context' => 'cn12_portfolio_timeline-abt-name'
            )
        )
    );

    // About Description
    $wp_customize->add_setting(
        'cn12_portfolio_timeline-about-description'
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cn12_portfolio_timeline-about-description',
            array(
                'type' => 'textarea',
                'label' => __('Change Your Description', 'cn12_portfolio_timeline'),
                'section' => 'title_tagline',
                'settings' => 'cn12_portfolio_timeline-about-description',
                'context' => 'cn12_portfolio_timeline-abt-description'
            )
        )
    );
}
add_action( 'customize_register', 'cn12_portfolio_timeline_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cn12_portfolio_timeline_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cn12_portfolio_timeline_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cn12_portfolio_timeline_customize_preview_js() {
	wp_enqueue_script( 'cn12_portfolio_timeline-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cn12_portfolio_timeline_customize_preview_js' );

function my_theme_mod( $name ) {
    global $my_theme_defaults;

    echo get_theme_mod( $name, $my_theme_defaults[ $name ] );
}

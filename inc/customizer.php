<?php
/**
 * cleora Theme Customizer
 *
 * @package cleora
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cleora_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting('cleora_link_color', array(
        'default'           => '#2d53fe',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'cleora_link_color', array(
        'label'    => __('Link Color', 'cleora'),
        'section'  => 'colors',
    )));
	
	
	$wp_customize->add_section( 'cleora_header_section' , array(
        'title'    => __( 'Header', 'cleora' ),
        'priority' => 30
    ));
    $wp_customize->add_setting( 'cleora_header_facebook' , array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'   => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cleora_header_facebook', array(
		'label'    => __( 'Facebook Link', 'cleora' ),
		'section'  => 'cleora_header_section',
		'settings' => 'cleora_header_facebook',
		'type'     => 'text'
	)));

	$wp_customize->add_setting( 'cleora_header_twitter' , array(
        'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cleora_header_twitter', array(
		'label'    => __( 'Twitter Link', 'cleora' ),
		'section'  => 'cleora_header_section',
		'settings' => 'cleora_header_twitter',
		'type'     => 'text'
	)));
	$wp_customize->add_setting( 'cleora_header_linked' , array(
    	'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cleora_header_linked', array(
		'label'    => __( 'Linkedin Link', 'cleora' ),
		'section'  => 'cleora_header_section',
		'settings' => 'cleora_header_linked',
		'type'     => 'text'
	)));
	$wp_customize->add_setting( 'cleora_header_instagram' , array(
    	'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cleora_header_instagram', array(
		'label'    => __( 'Instagram Link', 'cleora' ),
		'section'  => 'cleora_header_section',
		'settings' => 'cleora_header_instagram',
		'type'     => 'text'
	)));
	$wp_customize->add_setting( 'cleora_header_youtube' , array(
    	'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cleora_header_youtube', array(
		'label'    => __( 'Youtube Link', 'cleora' ),
		'section'  => 'cleora_header_section',
		'settings' => 'cleora_header_youtube',
		'type'     => 'text'
	)));



	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'cleora_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'cleora_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'cleora_customize_register' );

// Change and reflect value accordingly
function cleora_change_link_color()
{
    $header_color = get_theme_mod('cleora_link_color', '#2d53fe');
	
    print '
    <style>
		a
		{
      color:'.esc_html($header_color).';
    }
		[type="submit"]{
			background-color:'.esc_html($header_color).';
		}
    </style>';

}

add_action('wp_head', 'cleora_change_link_color', 1100);

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cleora_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cleora_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cleora_customize_preview_js() {
	wp_enqueue_script( 'cleora-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), CLEORA_VERSION, true );
}
add_action( 'customize_preview_init', 'cleora_customize_preview_js' );

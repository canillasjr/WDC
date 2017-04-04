<?php
/**
 * Undiscovered Theme Customizer
 *
 */

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';


function undiscovered_options($name, $default = false) {
	$options = ( get_option( 'undiscovered_options' ) ) ? get_option( 'undiscovered_options' ) : null; 

	// return the option if it exists 
	if ( isset( $options[ $name ] ) ) {
		return apply_filters( 'undiscovered_options_$name', $options[ $name ] ); 
	} 

	// return default if nothing else 
	return apply_filters( 'undiscovered_options_$name', $default ); 
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function undiscovered_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Logo upload
	$wp_customize->add_section( 'undiscovered_logotype' , array(
		'title'       => __( 'Logotype', 'undiscovered' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name in the header',
	) );
	$wp_customize->add_setting( 'undiscovered_options[logotype]', array( 
		'capability' => 'edit_theme_options', 
		'type' => 'option' 
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logotype', array(
		'label'        => __( 'Logo', 'undiscovered' ),
		'section'    => 'undiscovered_logotype',
		'settings'   => 'undiscovered_options[logotype]',
	) ) );


	// Fonts
	$wp_customize->add_section( 'undiscovered_fonts' , array(
		'title'       => __( 'Fonts', 'undiscovered' ),
		'priority'    => 30,
		'description' => 'Set main website font',
	) );
	$wp_customize->add_setting( 'undiscovered_options[font]', array( 
		'capability' => 'edit_theme_options', 
		'default'   => 'Rokkit',
		'type' => 'option' 
	) );
	$wp_customize->add_control( 'font', array(
		'settings' => 'undiscovered_options[font]',
		'label'   => __( 'Fonts', 'undiscovered' ),
		'section' => 'undiscovered_fonts',
		'type'    => 'select',
		'choices'    => array(
			'Rokkitt' => 'Rokkitt',
			'Kameron' => 'Kameron',
			'Abel' => 'Abel',
			'Alice' => 'Alice',
			'Andada' => 'Andada',
			'Arbutus+Slab' => 'Arbutus Slab',
			'Arvo' => 'Arvo',
			'Brawler' => 'Brawler',
			'Cambo' => 'Cambo',
			'Cookie' => 'Cookie',
			'Droid+Serif' => 'Droid Serif',
			'Fenix' => 'Fenix',
			'Judson' => 'Judson',
			'Ledger' => 'Ledger',
			'Libre+Baskerville' => 'Libre Baskerville',
			'Lora' => 'Lora',
			'Mako' => 'Mako',
			'Marck+Script' => 'Marck Script',
			'Maven+Pro' => 'Maven Pro',
			'Neuton' => 'Neuton',
			'Ovo' => 'Ovo',
			'PT+Serif+Caption' => 'PT Serif Caption'
		)
	));


	// Colors
	$wp_customize->add_section( 'undiscovered_colors', array(
		'title'    => __( 'Colors', 'undiscovered' ),
		'priority' => 40,
	) );

	// Primary
	$wp_customize->add_setting('undiscovered_options[primary_color]', array( 
		'default' => 'e83d52', 
		'sanitize_callback' => 'sanitize_hex_color', 
		'capability' => 'edit_theme_options', 
		'type' => 'option' 
	));   
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'primary_color', array( 
		'label' => __('Primary color', 'undiscovered'), 
		'section' => 'undiscovered_colors', 
		'settings' => 'undiscovered_options[primary_color]', 
	)));

	// Secondary
	$wp_customize->add_setting('undiscovered_options[secondary_color]', array( 
		'default' => 'be3243', 
		'sanitize_callback' => 'sanitize_hex_color', 
		'capability' => 'edit_theme_options', 
		'type' => 'option' 
	));   
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'secondary_color', array( 
		'label' => __('Secondary color', 'undiscovered'), 
		'section' => 'undiscovered_colors', 
		'settings' => 'undiscovered_options[secondary_color]', 
	)));


	// Social icons
	$wp_customize->add_section( 'undiscovered_social' , array(
		'title'       => __( 'Social icons', 'undiscovered' ),
		'priority'    => 30,
		'description' => 'Leave blank if don\'t needed',
	) );

	$networks = get_social_networks();

	foreach($networks as $network){
		$wp_customize->add_setting( 'undiscovered_options[social_'.strtolower($network).']', array( 
			'capability' => 'edit_theme_options', 
			'type' => 'option' 
		) );
		$wp_customize->add_control( 'undiscovered_options[social_'.strtolower($network).']', array(
			'label' => $network,
			'section' => 'undiscovered_social',
			'type' => 'text'
		));
	}
}
add_action( 'customize_register', 'undiscovered_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function undiscovered_customize_preview_js() {
	wp_enqueue_script( 'undiscovered_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'undiscovered_customize_preview_js' );

<?php
/**
 * VIP Industrial: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vipindustrial_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'vipindustrial_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'vipindustrial_customize_partial_blogdescription',
	) );

	/**
	 * Custom colors.
	 */
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'header_image' );

	/**
	 * Email address for site
	**/
	$wp_customize->add_setting( 'vipindustrial_email', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'vipindustrial_sanitize_email',
	) );

	$wp_customize->add_control( 'vipindustrial_email', array(
		'type' => 'email',
		'section' => 'title_tagline', // Required, core or custom.
		'label' => __( 'Email Address' ),
		'description' => __( 'Enter Site email address' ),
		'input_attrs' => array(
			'placeholder' => __( 'email@domain.com' ),
		),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'vipindustrial_phone', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vipindustrial_sanitize_number_absint',
		'default' => 0123456789,
	) );

	$wp_customize->add_control( 'vipindustrial_phone', array(
		'type' => 'text',
		'section' => 'title_tagline', // Add a default or your own section
		'label' => __( 'Contact Number' ),
		'description' => __( 'Enter contact number.' ),
		'priority' => 50,
	) );

	/**
	* Social site icons for Quick Menu bar
	*/
	$wp_customize->add_section( 'social_settings', array(
		'title' => __( 'Social Media Icons', 'vipindustrial' ),
		'priority' => 100,
	));

	$social_sites = vipindustrial_get_social_sites();
	$priority = 5;

	foreach( $social_sites as $social_site ) {
		$wp_customize->add_setting( "$social_site", array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( $social_site, array(
			'label' => ucwords( __( "$social_site URL:", 'social_icon' ) ),
			'section' => 'social_settings',
			'type' => 'text',
			'priority' => $priority,
		));

		$priority += 5;
	}

	// $wp_customize->add_setting( 'colorscheme', array(
	// 	'default'           => 'light',
	// 	'transport'         => 'postMessage',
	// 	'sanitize_callback' => 'vipindustrial_sanitize_colorscheme',
	// ) );

	// $wp_customize->add_setting( 'colorscheme_hue', array(
	// 	'default'           => 250,
	// 	'transport'         => 'postMessage',
	// 	'sanitize_callback' => 'absint', // The hue is stored as a positive integer.
	// ) );

	// $wp_customize->add_control( 'colorscheme', array(
	// 	'type'    => 'radio',
	// 	'label'    => __( 'Color Scheme', 'vipindustrial' ),
	// 	'choices'  => array(
	// 		'light'  => __( 'Light', 'vipindustrial' ),
	// 		'dark'   => __( 'Dark', 'vipindustrial' ),
	// 		'custom' => __( 'Custom', 'vipindustrial' ),
	// 	),
	// 	'section'  => 'colors',
	// 	'priority' => 5,
	// ) );

	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorscheme_hue', array(
	// 	'mode' => 'hue',
	// 	'section'  => 'colors',
	// 	'priority' => 6,
	// ) ) );

	/**
	 * Theme options.
	 */
	// $wp_customize->add_section( 'theme_options', array(
	// 	'title'    => __( 'Theme Options', 'vipindustrial' ),
	// 	'priority' => 130, // Before Additional CSS.
	// ) );

	// $wp_customize->add_setting( 'page_layout', array(
	// 	'default'           => 'two-column',
	// 	'sanitize_callback' => 'vipindustrial_sanitize_page_layout',
	// 	'transport'         => 'postMessage',
	// ) );

	// $wp_customize->add_control( 'page_layout', array(
	// 	'label'       => __( 'Page Layout', 'vipindustrial' ),
	// 	'section'     => 'theme_options',
	// 	'type'        => 'radio',
	// 	'description' => __( 'When the two-column layout is assigned, the page title is in one column and content is in the other.', 'vipindustrial' ),
	// 	'choices'     => array(
	// 		'one-column' => __( 'One Column', 'vipindustrial' ),
	// 		'two-column' => __( 'Two Column', 'vipindustrial' ),
	// 	),
	// 	'active_callback' => 'vipindustrial_is_view_with_layout_option',
	// ) );

	/**
	 * Filter number of front page sections in VIP Industrial.
	 *
	 * @since VIP Industrial 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'vipindustrial_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'vipindustrial' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'vipindustrial' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'vipindustrial_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'vipindustrial_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'vipindustrial_customize_register' );

/**
 * Sanitize the page layout options.
 *
 * @param string $input Page layout.
 */
function vipindustrial_sanitize_page_layout( $input ) {
	$valid = array(
		'one-column' => __( 'One Column', 'vipindustrial' ),
		'two-column' => __( 'Two Column', 'vipindustrial' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function vipindustrial_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since VIP Industrial 1.0
 * @see vipindustrial_customize_register()
 *
 * @return void
 */
function vipindustrial_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since VIP Industrial 1.0
 * @see vipindustrial_customize_register()
 *
 * @return void
 */
function vipindustrial_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function vipindustrial_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function vipindustrial_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function vipindustrial_customize_preview_js() {
	wp_enqueue_script( 'vipindustrial-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'vipindustrial_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function vipindustrial_panels_js() {
	wp_enqueue_script( 'vipindustrial-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vipindustrial_panels_js' );

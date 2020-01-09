<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'dotdigital-icon-fonts',
	get_template_directory_uri() . '/css/fonts.css',
	array(),
	'1.0.2'
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'dotdigital-admin_bar',
		get_template_directory_uri() . '/css/admin-frontend.css',
		array(),
		'1.0.2'
	);
	wp_enqueue_style( 'dotdigital-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'dotdigital-font',
	dotdigital_google_font_url(),
	array(),
	'1.0.2'
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'dotdigital-keyboard-image-navigation',
		get_template_directory_uri() . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		'1.0.2'
	);
}

//plugins theme script
wp_enqueue_script(
	'dotdigital-modernizr',
	get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js',
	false,
	'2.6.2',
	false
);

//plugins theme script
wp_enqueue_script(
	'dotdigital-compressed',
	get_template_directory_uri() . '/js/compressed.js',
	array( 'jquery' ),
	'1.0.2',
	true
);
//custom plugins theme script
wp_enqueue_script(
	'dotdigital-plugins',
	get_template_directory_uri() . '/js/plugins.js',
	array( 'jquery' ),
	'1.0.2',
	true
);

//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';
//get template part from ULR - for demo
if ( isset( $_GET[ 'color' ] ) ) {
	$color_scheme_number = ( int ) $_GET[ 'color' ];
}

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_deregister_style( 'woocommerce_prettyPhoto_css' );

	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'dotdigital-woo',
		get_template_directory_uri() . '/css/woo' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		'1.0.2'
	);

	wp_enqueue_script(
		'dotdigital-woo',
		get_template_directory_uri() . '/js/woo.js',
		array( 'jquery' ),
		'1.0.2',
		true
	);
endif; //WooCommerce

//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';
//get template part from ULR - for demo
if ( isset( $_GET[ 'color' ] ) ) {
	$color_scheme_number = ( int ) $_GET[ 'color' ];
}


//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'dotdigital-booked',
		get_template_directory_uri() . '/css/booked' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		'1.0.1'
	);
}//Booked

//main theme script
wp_enqueue_script(
	'dotdigital-main',
	get_template_directory_uri() . '/js/main.js',
	array( 'jquery' ),
	'1.0.2',
	true
);

if(class_exists('booked_plugin')) {
// For Booked plugin
	wp_register_script( 'dotdigital_booked_translate', get_template_directory_uri() . '/js/booked.js' );
// Localize the script with new data
	$translation_array = array(
		'today_string' => esc_html__( 'Today', 'dotdigital' ),
		'a_value'      => '10'
	);
	wp_localize_script( 'dotdigital_booked_translate', 'booked_today', $translation_array );
// Enqueued script with localized data.
	wp_enqueue_script(
		'dotdigital_booked_translate',
		get_template_directory_uri() . '/js/booked.js',
		array( 'jquery' ),
		'1.0.1',
		true
	);
}

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'fontawesome-css' );
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'dotdigital-accesspress',
		get_template_directory_uri() . '/css/accesspress.css',
		array(),
		'1.0.2'
	);
endif; //AccessPress

// Add Theme stylesheet.
wp_enqueue_style( 'dotdigital-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'dotdigital-bootstrap',
	get_template_directory_uri() . '/css/bootstrap.min.css',
	array(),
	'1.0.2'
);

// Add Animations Style
wp_enqueue_style(
	'dotdigital-animations',
	get_template_directory_uri() . '/css/animations.css',
	array(),
	'1.0.2'
);


// Add Theme Style
wp_enqueue_style(
	'dotdigital-main',
	get_template_directory_uri() . '/css/main' . esc_attr( $color_scheme_number ) . '.css',
	array(),
	'1.0.2'
);

wp_add_inline_style( 'dotdigital-main', dotdigital_add_font_styles_in_head() );
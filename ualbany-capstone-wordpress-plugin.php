<?php
/**
 * Plugin Name: Schema Plugin - Local Business
 * Description: Adds a Schema Info Input page to the admin bar
 * Author: Michael Gregory, Naganobu Masuda, Muhammad H Kahn, Michael Giustiniani
 * Text Domain: uacapstone
 * Domain Path: /languages
 */


//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// load text domain
function uacapstone_load_textdomain() {
	
	load_plugin_textdomain( 'uacapstone', false, plugin_dir_path( __FILE__ ) . 'languages/' );
	
}
add_action( 'plugins_loaded', 'uacapstone_load_textdomain' );



// if admin area

if ( is_admin() ) {

	// include dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';

}

//include dependencies: admin and public
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';


// set the default value for each type of field. 
function uacapstone_options_default() {

	return array(
		//'type'     => esc_html__( 'Local Business', 'uacapstone' ),
		'selected_page' => esc_html__( '2', 'uacapstone' ),
		'name'     => esc_html__( 'Name of local business', 'uacapstone' ),
		'telephone'     => esc_html__( '+1(555)555-5555', 'uacapstone' ),
		'description'     => esc_html__( 'Local business', 'uacapstone' ),
		//'Website_URL'     => esc_html__( 'https://schema.org', 'uacapstone' ),
		//'address'     => esc_html__( '', 'uacapstone' ),
		//'PostalAddress'     => esc_html__( '', 'uacapstone' ),
		'streetAddress'     => esc_html__( '123 Main St.', 'uacapstone' ),
		'addressRegion'     => esc_html__( 'NY', 'uacapstone' ),
		'addressLocality'     => esc_html__( 'Albany', 'uacapstone' ),

	);

}

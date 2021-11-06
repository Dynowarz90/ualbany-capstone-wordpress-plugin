<?php //UA Capstone - Register Settings



//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// register plugin settings
function uacapstone_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
	);
	
	*/
	
	register_setting( 
		'uacapstone_options', 
		'uacapstone_options', 
		'uacapstone_callback_validate_options' 
	); 


    	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'uacapstone_section_schema', 
		esc_html__( 'Schema Markup', 'uacapstone' ), 
		'uacapstone_callback_section_schema', 
		'uacapstone'
	);
	
    // We're not using this delete it later. 
	// add_settings_section( 
	// 	'myplugin_section_admin', 
	// 	'Customize Admin Area', 
	// 	'myplugin_callback_section_admin', 
	// 	'myplugin'
	// );

	/*

	add_settings_field(
    	string   $id,  <-- Must be unique to each field. 
		string   $title,  <-- What is displayed in the Admin Page. 
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

    //Duplicate this for as many fields as you would like to add
	add_settings_field(
		'phone_number',
		esc_html__( 'Phone Number', 'uacapstone' ),
		'uacapstone_callback_field_text',
		'uacapstone',
		'uacapstone_section_schema',
		[ 'id' => 'phone_number', 'label' => esc_html__( 'Enter your organization\'s phone number.', 'uacapstone' ) ]
	);


}
add_action( 'admin_init', 'uacapstone_register_settings' );
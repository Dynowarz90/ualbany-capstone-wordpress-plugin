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
		callable $callback, <- Displays markup for the caption under the settings section heading. 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'uacapstone_section_schema', 
		esc_html__( 'Schema Markup', 'uacapstone' ), 
		'uacapstone_callback_section_schema', 
		'uacapstone'
	);

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
		'type_of_Schema',
		esc_html__('Type of Schema', 'uacapstone'),
		'uacapstone_callback_field_select',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'type_of_Schema', 'label' => esc_html__('Choose your organization\'s type. ', 'uacapstone') ]
	);
	add_settings_field(
		'establish_name',
		esc_html__('Establishment Name', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'establish_name', 'label' => esc_html__('Enter your organization\'s establishment name. ', 'uacapstone') ]
	);
	add_settings_field(
		'Website_URL',
		esc_html__('Website URL', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'Website_URL', 'label' => esc_html__('Enter your organization\'s Website URL. ', 'uacapstone') ]
	);
	add_settings_field(
		'address',
		esc_html__('Address', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'address', 'label' => esc_html__('Enter your organization\'s address. ', 'uacapstone') ]
	);
	add_settings_field(
		'phone_number',
		esc_html__('Phone Number', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'phone_number', 'label' => esc_html__( 'Enter your organization\'s phone number.', 'uacapstone' ) ]
	);
	add_settings_field(
		'day_of_work',
		esc_html__('Day of Week', 'uacapstone'),
		'uacapstone_callback_field_select',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'day_of_work', 'label' => esc_html__('Choose your organization\'sday of week. ', 'uacapstone') ]
	);
	add_settings_field(
		'hours_ope',
		esc_html__('Hours of Operation', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'hours_ope', 'label' => esc_html__('Enter your organization\'s hours of operation. ', 'uacapstone') ]
	);


}
add_action( 'admin_init', 'uacapstone_register_settings' );
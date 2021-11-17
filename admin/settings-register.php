<?php //UA Capstone - Register Settings



//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// register plugin settings
function uacapstone_register_settings() {
	
	
	register_setting( 
		'uacapstone_options', 
		'uacapstone_options', 
		'uacapstone_callback_validate_options' 
	); 



	
	add_settings_section( 
		'uacapstone_section_schema', 
		esc_html__( 'Schema Markup', 'uacapstone' ), 
		'uacapstone_callback_section_schema', 
		'uacapstone'
	);



	add_settings_field(
		'name',
		esc_html__('Name', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'name', 'label' => esc_html__('Enter local business\'s name. ', 'uacapstone') ]
	);
	add_settings_field(
		'telephone',
		esc_html__('Phone Number', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'telephone', 'label' => esc_html__( 'Enter your organization\'s phone number.', 'uacapstone' ) ]
	);
	add_settings_field(
		'description',
		esc_html__('Description', 'uacapstone'),
		'uacapstone_callback_field_textarea',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'description', 'label' => esc_html__('Enter local business\'s description. ', 'uacapstone') ]
	);
	// add_settings_field(
	// 	'Website_URL',
	// 	esc_html__('Website URL', 'uacapstone'),
	// 	'uacapstone_callback_field_text',
	// 	'uacapstone', 
	// 	'uacapstone_section_schema', 
	// 	[ 'id' => 'Website_URL', 'label' => esc_html__('Enter your organization\'s Website URL. ', 'uacapstone') ]
	// );
	// add_settings_field(
	// 	'address',
	// 	esc_html__('Address', 'uacapstone'),
	// 	'uacapstone_callback_field_text',
	// 	'uacapstone', 
	// 	'uacapstone_section_schema', 
	// 	[ 'id' => 'address', 'label' => esc_html__('Enter your organization\'s address. ', 'uacapstone') ]
	// );
	// add_settings_field(
	// 	'PostalAddress',
	// 	esc_html__('Postal address', 'uacapstone'),
	// 	'uacapstone_callback_field_text',
	// 	'uacapstone', 
	// 	'uacapstone_section_schema', 
	// 	[ 'id' => 'PostalAddress', 'label' => esc_html__('Enter your organization\'s postal address. ', 'uacapstone') ]
	// );
	add_settings_field(
		'streetAddress',
		esc_html__('Address', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'streetAddress', 'label' => esc_html__('Enter your organization\'s street address. ', 'uacapstone') ]
	);
	add_settings_field(
		'addressRegion',
		esc_html__('State', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'addressRegion', 'label' => esc_html__('Enter your organization\'s address region. ', 'uacapstone') ]
	);
	add_settings_field(
		'addressLocality',
		esc_html__('City', 'uacapstone'),
		'uacapstone_callback_field_text',
		'uacapstone', 
		'uacapstone_section_schema', 
		[ 'id' => 'addressLocality', 'label' => esc_html__('Enter your organization\'s address locality. ', 'uacapstone') ]
	);

	// add_settings_field(
	// 	'day_of_work',
	// 	esc_html__('Day of Week', 'uacapstone'),
	// 	'uacapstone_callback_field_select',
	// 	'uacapstone', 
	// 	'uacapstone_section_schema', 
	// 	[ 'id' => 'day_of_work', 'label' => esc_html__('Choose your organization\'sday of week. ', 'uacapstone') ]
	// );
	// add_settings_field(
	// 	'hours_ope',
	// 	esc_html__('Hours of Operation', 'uacapstone'),
	// 	'uacapstone_callback_field_text',
	// 	'uacapstone', 
	// 	'uacapstone_section_schema', 
	// 	[ 'id' => 'hours_ope', 'label' => esc_html__('Enter your organization\'s hours of operation. ', 'uacapstone') ]
	// );


}
add_action( 'admin_init', 'uacapstone_register_settings' );

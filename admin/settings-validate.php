<?php //UA Capstone - Validate Settings


//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// callback: validate options
function uacapstone_callback_validate_options( $input ) {
	
	// phone number
	if ( isset( $input['phone_number'] ) ) {
		
		$input['phone_number'] = wp_kses_post( $input['phone_number'] );
		
	}
	
	return $input;
	
}
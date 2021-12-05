<?php //UA Capstone - Validate Settings


//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// callback: validate options
function uacapstone_callback_validate_options( $input ) {
	
    //Duplicate this for as many fields as you would like to add

	if ( isset( $input['selected_page'] ) ) {	
	
		$input['selected_page'] = sanitize_text_field( $input['selected_page'] );
	
	}

	if ( isset( $input['name'] ) ) {	
	
		$input['name'] = sanitize_text_field( $input['name'] );
	
	}

	if ( isset( $input['telephone'] ) ) {
		
		$input['telephone'] = sanitize_text_field( $input['telephone'] );
		
	}

	if ( isset( $input['description'] ) ) {	
	
		$input['description'] = sanitize_textarea_field( $input['description'] );
	
	}


	// if ( isset( $input['Website_URL'] ) ) {
		
	// 	$input['Website_URL'] = esc_url( $input['Website_URL'] );

	// }

	// if ( isset( $input['address'] ) ) {	
	
	// 	$input['address'] = sanitize_text_field( $input['address'] );
	
	// }

	// if ( isset( $input['PostalAddress'] ) ) {	
	
	// 	$input['PostalAddress'] = sanitize_text_field( $input['PostalAddress'] );
	
	// }

	if ( isset( $input['streetAddress'] ) ) {	
	
		$input['streetAddress'] = sanitize_text_field( $input['streetAddress'] );
	
	}

	if ( isset( $input['addressRegion'] ) ) {	
	
		$input['addressRegion'] = sanitize_text_field( $input['addressRegion'] );
	
	}

	if ( isset( $input['addressLocality'] ) ) {	
	
		$input['addressLocality'] = sanitize_text_field( $input['addressLocality'] );
	
	}


	// // custom message
	// if ( isset( $input['custom_message'] ) ) {	
	// 	$input['custom_message'] = wp_kses_post( $input['custom_message'] );
	// }
	// // custom style
	// $radio_options = myplugin_options_radio();
	// if ( ! isset( $input['custom_style'] ) ) {
	// 	$input['custom_style'] = null;
	// }
	//     // $radio_optionsがarrayにあるかの確認
	// if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) { 
	// 	$input['custom_style'] = null;
	// }
	// // custom toolbar
	// if ( ! isset( $input['custom_toolbar'] ) ) {	
	// 	$input['custom_toolbar'] = null;
	// }
	// $input['custom_toolbar'] = ($input['custom_toolbar'] == 1 ? 1 : 0);  // true or false	
	// // custom scheme
	// $select_options = myplugin_options_select();
	// if ( ! isset( $input['custom_scheme'] ) ) {	
	// 	$input['custom_scheme'] = null;
	// }
	//     // $select_optionsがarrayにあるかの確認
	// if ( ! array_key_exists( $input['custom_scheme'], $select_options ) ) {	 
	// 	$input['custom_scheme'] = null;
	// }


	// custom scheme
	$select_options = uacapstone_options_select();
	
	if ( ! isset( $input['selected_page'] ) ) {
		
		$input['selected_page'] = null;
		
	}
	
	if ( ! array_key_exists( $input['selected_page'], $select_options ) ) {
		
		$input['selected_page'] = null;
	
	}

	return $input;
	
}

<?php //UA Capstone - Settings Callbacks



//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// callback: login section
function uacapstone_callback_section_schema() {
	
	echo '<p>' . esc_html__( 'These settings enable you to set fields to be displayed in search results.', 'uacapstone' ) . '</p>';
	
}



//Displays the markup for a text field on the Admin Page. 
// callback: text field
function uacapstone_callback_field_text( $args ) {
	
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="uacapstone_options_'. $id .'" name="uacapstone_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="uacapstone_options_'. $id .'">'. $label .'</label>';
	
}



// // radio field options
// function uacapstone_options_radio() {
// 	return array(
// 		'enable'  => esc_html__('Enable custom styles', 'uacapstone'),
// 		'disable' => esc_html__('Disable custom styles', 'uacapstone')
// 	);
// }

// // callback: radio field
// function uacapstone_callback_field_radio( $args ) {
// 	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
// 	$id    = isset( $args['id'] )    ? $args['id']    : '';
// 	$label = isset( $args['label'] ) ? $args['label'] : '';
	
// 	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
// 	$radio_options = uacapstone_options_radio();
	
// 	foreach ( $radio_options as $value => $label ) {
// 		$checked = checked( $selected_option === $value, true, false );	
// 		echo '<label><input name="uacapstone_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
// 		echo '<span>'. $label .'</span></label><br />';
// 	}	
// }

// // callback: textarea field
// function uacapstone_callback_field_textarea( $args ) {
// 	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
// 	$id    = isset( $args['id'] )    ? $args['id']    : '';
// 	$label = isset( $args['label'] ) ? $args['label'] : '';
	
// 	$allowed_tags = wp_kses_allowed_html( 'post' );
	
// 	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
// 	echo '<textarea id="uacapstone_options_'. $id .'" name="uacapstone_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
// 	echo '<label for="uacapstone_options_'. $id .'">'. $label .'</label>';	
// }

// // callback: checkbox field
// function uacapstone_callback_field_checkbox( $args ) {
// 	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
// 	$id    = isset( $args['id'] )    ? $args['id']    : '';
// 	$label = isset( $args['label'] ) ? $args['label'] : '';
	
// 	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
// 	echo '<input id="uacapstone_options_'. $id .'" name="uacapstone_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
// 	echo '<label for="uacapstone_options_'. $id .'">'. $label .'</label>';
// }

// select field options
function uacapstone_options_select() {
	return array(
		'default'   => esc_html__('Default',   'uacapstone'),
		'monday'     => esc_html__('Monday',     'uacapstone'),
		'tuesday'      => esc_html__('Tuesday',      'uacapstone'),
		'wednesday'    => esc_html__('Wednesday',    'uacapstone'),
		'thursday' => esc_html__('Thursday', 'uacapstone'),
		'friday'  => esc_html__('Friday',  'uacapstone'),
		'saturday'     => esc_html__('Saturday',     'uacapstone'),
		'sunday'   => esc_html__('Sunday',   'uacapstone'),

		// not completed
		'localbusiness'   => esc_html__('Local Business',   'uacapstone'),
		'article'   => esc_html__('Book',   'uacapstone'),
		'faq'   => esc_html__('FAQ',   'uacapstone'),
	);
}

// callback: select field
function uacapstone_callback_field_select( $args ) {
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = uacapstone_options_select();
	
	echo '<select id="uacapstone_options_'. $id .'" name="uacapstone_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		$selected = selected( $selected_option === $value, true, false );
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';	
	}
	echo '</select> <label for="uacapstone_options_'. $id .'">'. $label .'</label>';	
}
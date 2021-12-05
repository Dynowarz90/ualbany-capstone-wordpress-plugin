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



// callback: textarea field
function uacapstone_callback_field_textarea( $args ) {
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	//$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? sanitize_textarea_field( $options[$id] ) : '';
	
	echo '<textarea id="uacapstone_options_'. $id .'" name="uacapstone_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="uacapstone_options_'. $id .'">'. $label .'</label>';	
}

// select field options
function uacapstone_options_select() {
	
	return array(
		
		2   => esc_html__('Sample Page',   'uacapstone'),
		11     => esc_html__('Test Page',     'uacapstone'),
		
	);
	
}



// callback: select field
function uacapstone_callback_field_select( $args ) {
	
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
	
	// $id    = isset( $args['id'] )    ? $args['id']    : '';
	// $label = isset( $args['label'] ) ? $args['label'] : '';
	
	// $selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	// $select_options = uacapstone_options_select();
	
	echo '<select name="uacapstone_options[selected_page]">';

	echo '<option value=\'0\'>';

	_e('Select a Page', 'uacapstone');

	echo '</option>';

	$pages = get_pages();
	
	foreach ( $pages as $page ) {
		
		echo '<option value=' . $page->ID . selected($options['selected_page'], $page->ID ) . '>' . $page->post_title . '</option>';
		
	};
	
	echo '</select>';
	
}
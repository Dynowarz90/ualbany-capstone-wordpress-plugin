<?php //UA Capstone - Admin Menu



//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// add sub-level administrative menu
function uacapstone_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'options-general.php',
		esc_html__( 'UAlbany Capstone Schema Plugin Settings', 'uacapstone' ),
		esc_html__( 'UA Capstone', 'uacapstone' ),
		'manage_options',
		'uacapstone',
		'uacapstone_display_settings_page'
	);
	
}
add_action( 'admin_menu', 'uacapstone_add_sublevel_menu' );
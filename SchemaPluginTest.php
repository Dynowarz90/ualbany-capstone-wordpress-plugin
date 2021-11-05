<?php
/**
 * Plugin Name: Schema Plugin - Local Business
 * Adds a Schema Info Input page to the admin bar
 * Author: Michael Gregory
 */

add_action( 'admin_menu', 'schema_options_page' );
function schema_options_page() {

    //create new top-level menu
    add_submenu_page('tools.php', 'schema_options', 'Schema Settings', 'administrator', __FILE__, 'schema_settings_page' );

    //call register settings function
    add_action( 'admin_init', 'register_schema_settings' );
}

function register_schema_settings() {
    //register our settings
    register_setting( 'schema-settings-group', 'schema_type' );
    register_setting( 'schema-settings-group', 'name' );
    register_setting( 'schema-settings-group', 'url' );
    register_setting( 'schema-settings-group', 'address' );
    register_setting( 'schema-settings-group', 'phone_number' );
    register_setting( 'schema-settings-group', 'day_of_week' );
    register_setting( 'schema-settings-group', 'hours' );
}

function schema_settings_page() {
?>
<div class="wrap">
<h1>Schema Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'schema-settings-group' ); ?>
    <?php do_settings_sections( 'schema-settings-group' ); ?>
    <table class="form-table">

	<tr valign="top">
        <th scope="row">Type of Schema</th>
	<td><!--<label for="schema_type">Choose your Schema Type:</label>-->
  	<select name="schema_type" id="schema_type">
    		<option value="localbusiness">Local Business</option>
    		<option value="book">Book</option>
    		<option value="article">Article</option>
    		<option value="faq">FAQ</option>
  	</select></td>
	</tr>

        <tr valign="top">
        <th scope="row">Establishment Name</th>
        <td><input type="text" name="name" value="<?php echo esc_attr( get_option('name') ); ?>" /></td>
        </tr>

	<tr valign="top">
        <th scope="row">Website URL</th>
        <td><input type="text" name="url" value="<?php echo esc_attr( get_option('url') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Address</th>
        <td><input type="text" name="address" value="<?php echo esc_attr( get_option('address') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Phone Number</th>
        <td><input type="text" name="phone_number" value="<?php echo esc_attr( get_option('phone_number') ); ?>" /></td>
        </tr>

         <tr valign="top">
        <th scope="row">Day of Week</th>
	<td><!--<label for="schema_type">Choose your Schema Type:</label>-->
  	<select name="day_of_week" id="day_of_week">
    		<option value="monday">Monday</option>
    		<option value="tuesday">Tuesday</option>
    		<option value="wednesday">Wednesday</option>
    		<option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
		    <option value="saturday">Saturday</option>
		    <option value="sunday">Sunday</option>
  	</select></td>
	</tr>

	<tr valign="top">
        <th scope="row">Hours of Operation</th>
        <td><input type="text" name="hours" value="<?php echo esc_attr( get_option('hours') ); ?>" /></td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
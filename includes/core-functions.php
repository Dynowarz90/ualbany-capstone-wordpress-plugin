<?php //UA Capstone - Core Functionality


//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


//Here's where the magic happens. 

function uacapstone_custom_structured_markup( $markup ) {
	
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );

    //Two variables to hold the Schema array. These will be concatinated on either side of the input from the user to be sent to the site header through the wp_head hook. 
    $schemaHeader = 
    '<script type="application/ld+json">
    {
      "@context": "' . get_site_url() . '",
      "@type": "LocalBusiness",
      
      "telephone": "';

      $schemaFooter = 
      '"
    }
    </script>';
	
	if ( isset( $options['phone_number'] ) && ! empty( $options['phone_number'] ) ) {
		
        //Concatinate Schema.org JSON-LD array with the string below:
        //We might have to check the order of strings concatinated. 
        //The original line below before concatination is: $markup = wp_kses_post( $options['phone_number'] ) . $markup;

		$markup = $schemaHeader .  wp_kses_post( $options['phone_number'] ) . $schemaFooter . $markup;
		
	}
	
	return $markup;
	
}

//This hook takes the output of our function and passes it in between the <head> tags in the page.  
add_filter( 'wp_head', 'uacapstone_custom_structured_markup' );



<?php //UA Capstone - Core Functionality


//Prevents direct access. 
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


function uacapstone_custom_structured_markup( $markup ) {
	
	$options = get_option( 'uacapstone_options', uacapstone_options_default() );
   
	//The following strings contain sections of the Schema tag from Schema.org to be appended to the options set in the database by the user. 


	$schemaOpeningToAddressLocality = '<script type="application/ld+json">
	{
	  "@context": "' . get_site_url() . '",
	  "@type": "LocalBusiness",
	  "address": {
		"@type": "PostalAddress",
		"addressLocality": "';

	$schemaAddressLocalityToAddressRegion = '",
    "addressRegion": "';

	$schemaAddressRegionToStreetAddress = '",
    "streetAddress": "';

	$schemaStreetAddressToDescription = '"
},
"description": "';

	$schemaDescriptionToName = '",
	"name": "';

	$schemaNameToTelephone = '",
	"telephone": "';

	$schemaTelephoneToEnd = '"
}
</script>';

	//In each if statement prepend the $markup with the appropriate schema string defined above followed by the existing markup. 
	

	//Append to markup in reverese order starting from the end of the Schema tag to the beginning. 

	//In this case we append the closing schema tag. 
	if ( isset( $options['telephone'] ) && ! empty( $options['telephone'] ) ) {
		   

		$markup = $schemaNameToTelephone .  esc_attr( $options['telephone'] ) . $schemaTelephoneToEnd . $markup;
		
	}

	if ( isset( $options['name'] ) && ! empty( $options['name'] ) ) {
		   

		$markup = $schemaDescriptionToName .  esc_attr( $options['name'] ) . $markup;
		
	}

	if ( isset( $options['description'] ) && ! empty( $options['description'] ) ) {
		   

		$markup = $schemaStreetAddressToDescription .  esc_attr( $options['description'] ) . $markup;
		
	}

	if ( isset( $options['streetAddress'] ) && ! empty( $options['streetAddress'] ) ) {
		

		$markup = $schemaAddressRegionToStreetAddress .  esc_attr( $options['streetAddress'] ) . $markup;
		
	}

	if ( isset( $options['addressRegion'] ) && ! empty( $options['addressRegion'] ) ) {
		    

		$markup = $schemaAddressLocalityToAddressRegion .  esc_attr( $options['addressRegion'] ) . $markup;
		
	}

	//Start section. 
	if ( isset( $options['addressLocality'] ) && ! empty( $options['addressLocality'] ) ) {
		   

		$markup = $schemaOpeningToAddressLocality .  esc_attr( $options['addressLocality'] ) . $markup;
		
	}

	
	
	//Output the result. 
	echo $markup;
	
}

//This hook takes the output of our function and passes it in between the <head> tags in the page.  
add_action( 'wp_head', 'uacapstone_custom_structured_markup' );


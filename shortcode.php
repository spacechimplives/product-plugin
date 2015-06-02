<?php

function product_box( $atts, $content ) {

//set default attributes

    $a = shortcode_atts( array(

	'widget' => 'true',
	
	'id' => 45

    ), $atts );
    


$prod_id = intval($a['id']);
$prod = get_product_atts($prod_id);
return output_box($prod);
}
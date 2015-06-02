<?php 


function output_box($prod){
$html = '
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 single-product">
        <div class="product-box clearfix"><a href="#">
            <div class="product-img">
				<img src="'.$prod['image'].'" alt="plan" class="plan-image"/>
            </div>
            <div class="plan-title equal-title">
				<span><b>'.$prod['title'].'</b> HOSTING</span></div>
            <div class="plan-description equal-description">
                <span>'.$prod['price'].'</span>
            </div>
        </a></div>
    </div>';

    return $html;
}
function colourBrightness($hex, $percent) {
    ///http://lab.clearpixel.com.au/2008/06/darken-or-lighten-colours-dynamically-using-php/
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}



//                <style type="text/css"><!--
//                .single-plan .plan-button-'.$prod['id'].', .sidebar .equal-plans .plan-button-'.$prod['id'].'{
//    background: #'.$prod['button_color'].'; /* Old browsers */
//    background: -moz-linear-gradient(top, #'.$butt.' 0%, #2e6b1e 100%); /* FF3.6+ */
//    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#'.$butt.'), color-stop(100%,#2e6b1e)); /* Chrome,Safari4+ */
//    background: -webkit-linear-gradient(top, #'.$butt.' 0%,#2e6b1e 100%); /* Chrome10+,Safari5.1+ */
//    background: -o-linear-gradient(top, #b3db61 0%,#2e6b1e 100%); /* Opera 11.10+ */
//    background: -ms-linear-gradient(top, #b3db61 0%,#2e6b1e 100%); /* IE10+ */
//    background: linear-gradient(to bottom, #b3db61 0%,#2e6b1e 100%); /* W3C */
//    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#b3db61", endColorstr="#2e6b1e",GradientType=0 ); /* IE6-9 */
//    border-color: #26690a;
//                }
//                --></style>

<?php 
function wpsm_shortcode( $atts ){
	ob_start();

	//Load scripts and styles
	//wp_enqueue_script("wpsm-google-maps-js","https://maps.googleapis.com/maps/api/js?key=AIzaSyCMwk7zQzrzEEnisp8j3ShtUzP0BvUSacw&callback=initMap");
	
	include(DIR_WP_SIMPLE_MAP."/requires/pages/front.php");
	return ob_get_clean();
}
add_shortcode('wpsm', 'wpsm_shortcode');
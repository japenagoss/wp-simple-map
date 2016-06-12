<?php 
function wpsm_shortcode( $atts ){
    ob_start();

    $args = array(
        'post_type' => 'map_locations',
        'order'     => 'ASC',
        'orderby'   => 'title'

    );

    $places         = new WP_Query($args);
    $places_map     = array();

    if($places->have_posts()){
        while ($places->have_posts()){ $places->the_post();
            array_push($places_map, array(
                "title"     => get_the_title(),
                "content"   => get_the_content(),
                "picture"   => get_the_post_thumbnail(),
                "latitude"  => get_post_meta(get_the_id(),"wpsm_latitude",true),
                "longitude" => get_post_meta(get_the_id(),"wpsm_longitude",true)
            ));
        }
    }

    wp_reset_postdata();

    //Load scripts and styles
    wp_enqueue_script("wpsm-google-maps-js","https://maps.googleapis.com/maps/api/js?key=AIzaSyCMwk7zQzrzEEnisp8j3ShtUzP0BvUSacw");
    wp_enqueue_script("wpsm-custom-js",URL_WP_SIMPLE_MAP."js/custom.js",array("wpsm-google-maps-js","jquery"));
    wp_localize_script("wpsm-custom-js","places",$places_map);

    wp_enqueue_style("wpsm-custom-css",URL_WP_SIMPLE_MAP."styles/style.css");

    include(DIR_WP_SIMPLE_MAP."/requires/pages/front.php");
    return ob_get_clean();
}
add_shortcode('wpsm', 'wpsm_shortcode');
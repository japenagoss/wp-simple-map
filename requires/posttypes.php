<?php
/**
 * File for create custom post type declaration for maps points. 
 * Else for create metaboxes and save their data
 * ------------------------------------------------------------------------------
 */ 
add_action('init', 'wpsm_create_post_type');

function wpsm_create_post_type(){
    $labels = array(
        'name'               => __( 'Locations', 'wp_simple_map' ),
        'singular_name'      => __( 'Location', 'wp_simple_map' ),
        'menu_name'          => __( 'Map', 'wp_simple_map' ),
        'name_admin_bar'     => __( 'Location', 'wp_simple_map' ),
        'add_new'            => __( 'Add New', 'book', 'wp_simple_map' ),
        'add_new_item'       => __( 'Add New Location', 'wp_simple_map' ),
        'new_item'           => __( 'New Location', 'wp_simple_map' ),
        'edit_item'          => __( 'Edit Location', 'wp_simple_map' ),
        'view_item'          => __( 'View Location', 'wp_simple_map' ),
        'all_items'          => __( 'All Locations', 'wp_simple_map' ),
        'search_items'       => __( 'Search Locations', 'wp_simple_map' ),
        'parent_item_colon'  => __( 'Parent Locations:', 'wp_simple_map' ),
        'not_found'          => __( 'No locations found.', 'wp_simple_map' ),
        'not_found_in_trash' => __( 'No locations found in Trash.', 'wp_simple_map' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'location','locations',
        'capabilities' => array(
            'edit_post'          => 'edit_location', 
            'read_post'          => 'read_location', 
            'delete_post'        => 'delete_location', 
            'edit_posts'         => 'edit_locatios', 
            'edit_others_posts'  => 'edit_others_locations', 
            'publish_posts'      => 'publish_locations',       
            'read_private_posts' => 'read_private_locations', 
            'create_posts'       => 'create_locations', 
        ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'menu_icon'          => URL_WP_SIMPLE_MAP.'images/map.png'
    );

    register_post_type( 'map_locations', $args );
}

/**
 * Register meta box(es).
 * -----------------------------------------------------------------------------
 */
function wpsm_register_meta_boxes() {
    add_meta_box(
        'settings-metabox-wp-simple-map', 
        __( 'Settings', 'wp_simple_map' ), 
        'wpsm_create_metabox', '
        map_locations' 
    );
}

/**
 * Generate meta box(es).
 */
function wpsm_create_metabox($post) {
    $latitude   = get_post_meta($post->ID,'wpsm_latitude', true);
    $longitude  = get_post_meta($post->ID,'wpsm_longitude', true);

    // Add an nonce field so we can check for it later.
    wp_nonce_field('wpsm_inner_custom_box', 'wpsm_inner_custom_box_nonce');

    include(DIR_WP_SIMPLE_MAP."/requires/pages/metabox.php");
}

/**
 * Save meta box(es) data
 */
function wpms_save_location($post_id){
    if(!isset($_POST['wpsm_inner_custom_box_nonce'])){
        return $post_id;
    }

    $nonce = $_POST['wpsm_inner_custom_box_nonce'];

    if(!wp_verify_nonce($nonce, 'wpsm_inner_custom_box')){
        return $post_id;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return $post_id;
    }

    if('map_locations' == $_POST['post_type'] ) {
        if(!current_user_can('edit_location', $post_id)){
            return $post_id;
        }
    }
    else{
        if(!current_user_can('edit_location', $post_id)){
            return $post_id;
        }
    }

    $latitude   = sanitize_text_field($_POST['wpsm_latitude']);
    $longitude  = sanitize_text_field($_POST['wpsm_longitude']);

    update_post_meta($post_id,'wpsm_latitude', $latitude);
    update_post_meta($post_id,'wpsm_longitude', $longitude);
}

/**
 * Load metaboxes
 */
function wpsm_load_metaboxes(){
    add_action('add_meta_boxes', 'wpsm_register_meta_boxes');  
    add_action( 'save_post', 'wpms_save_location');
}

if(is_admin()){
    add_action('load-post.php',     'wpsm_load_metaboxes');
    add_action('load-post-new.php', 'wpsm_load_metaboxes');
}
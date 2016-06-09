<?php
/**
 * File for create custom post type declaration for maps points. 
 * Else for create metaboxes and save their data
 */ 
add_action('init', 'create_wp_simple_map_post_type');

function create_wp_simple_map_post_type(){
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
<?php
function wp_simple_map_activation(){
    $role = get_role("administrator");
    
    $role->add_cap("edit_location");
    $role->add_cap("read_location");
    $role->add_cap("delete_location");
    $role->add_cap("edit_locatios");
    $role->add_cap("edit_others_locations");
    $role->add_cap("publish_locations");
    $role->add_cap("read_private_locations");
    $role->add_cap("create_locations");
}

function wp_simple_map_deactivation(){
    $role = get_role("administrator");
    
    $role->remove_cap("edit_location");
    $role->remove_cap("read_location");
    $role->remove_cap("delete_location");
    $role->remove_cap("edit_locatios");
    $role->remove_cap("edit_others_locations");
    $role->remove_cap("publish_locations");
    $role->remove_cap("read_private_locations");
    $role->remove_cap("create_locations");
}
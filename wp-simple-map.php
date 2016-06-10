<?php
/*
Plugin Name: WP Simple Map
Plugin URI: #
Description: This a plugin for make simples maps  
Version: 1.0
Author: Jhony Penagos
Author URI: #
License: GPLv2 or later
Text Domain: wp_simple_map
*/

/**
 * All Constants for use in the plugin
 * ------------------------------------------------------------------------
 */
define(URL_WP_SIMPLE_MAP,plugins_url("/",__FILE__));
define(DIR_WP_SIMPLE_MAP,plugin_dir_path(__FILE__));

/**
 * Hooks and functions when the plugins is activate and deactivate
 * ------------------------------------------------------------------------
 */
register_activation_hook(__FILE__,"wpsm_activation");
register_deactivation_hook(__FILE__,"wpsm_deactivation");

include(DIR_WP_SIMPLE_MAP."/requires/capabilities.php");

/**
 * Post type and metaboxes
 * ------------------------------------------------------------------------
 */
include(DIR_WP_SIMPLE_MAP."/requires/posttypes.php");


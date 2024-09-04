<?php
/*
Plugin Name: Buffett Indicator Plugin
Description: A simple plugin to display the Buffett Indicator as a shortcode.
Version: 1.0
Author: ServiceCraft
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include core plugin class
require_once plugin_dir_path(__FILE__) . 'includes/class-buffett-indicator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-buffett-api.php';


// Initialize the plugin
function buffett_indicator_init() {
    $plugin = new Buffett_Indicator();
    $plugin->run();
}
add_action('plugins_loaded', 'buffett_indicator_init');

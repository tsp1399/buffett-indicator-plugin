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

// Add this at the end of the file for testing purposes
function buffett_test_apis() {
    $buffett_api = new Buffett_API();
    $buffett_api->test_apis();
}

// Uncomment the following line to run the test when the plugin loads
// add_action('plugins_loaded', 'buffett_test_apis');

// Alternatively, you can create an admin menu item to run the test
add_action('admin_menu', 'buffett_add_test_menu');

function buffett_add_test_menu() {
    add_management_page(
        'Test Buffett APIs',
        'Test Buffett APIs',
        'manage_options',
        'buffett-test-apis',
        'buffett_test_apis_page'
    );
}

function buffett_test_apis_page() {
    echo '<div class="wrap">';
    echo '<h1>Test Buffett APIs</h1>';
    echo '<pre>';
    buffett_test_apis();
    echo '</pre>';
    echo '</div>';
}

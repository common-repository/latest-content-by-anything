<?php
/*
Plugin Name: Latest Content by Anything
Description: Display the latest content using a shortcode with flexible filters for taxonomy, post type, layout, and more. Customize your output with various display options, including WooCommerce product prices.
Version: 1.0.13
Author: Jonny Quinn
Author URI: https://displayposts.co.uk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: latest-content-by-anything
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Include shortcode functions
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';

// Enqueue styles
function latest_content_by_anything_enqueue_styles() {
    wp_enqueue_style( 'latest-content-styles', plugin_dir_url( __FILE__ ) . 'css/latest-content-styles.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'latest_content_by_anything_enqueue_styles' );

// Add a custom "Documentation" link to the plugin row meta
function add_plugin_documentation_link($plugin_meta, $plugin_file, $plugin_data) {
    // Check if this is your specific plugin
    if ($plugin_file === 'latest-content-by-anything/latest_content_by_anything.php') {
        // Define the documentation URL
        $documentation_url = 'http://displayposts.co.uk';

        // Create a new link to the documentation
        $documentation_link = '<a href="' . esc_url($documentation_url) . '" target="_blank">Documentation</a>';

        // Insert the documentation link into the meta array
        array_push($plugin_meta, $documentation_link);
    }

    return $plugin_meta;
}
add_filter('plugin_row_meta', 'add_plugin_documentation_link', 10, 3);



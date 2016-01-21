<?php
/*
Plugin Name: More Posts with AJAX
Description: Displays links to related posts through the WP-API
Version:     0.1
Author:      Jennifer Gapay
Author URI:  jennifergapay.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: moreposts
*/

// hook in all the important things
function moreposts_scripts() {
  //call CSS only for single post & main query
  if( is_single() && is_main_query() ) {
    // get plugin stylesheet
    wp_enqueue_style( 'moreposts-style', plugin_dir_url( __FILE__ ) . 'css/style.css', '0.1', 'all');
  }

}
add_action( 'wp_enqueue_scripts', 'moreposts_scripts' );
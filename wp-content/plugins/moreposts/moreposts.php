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


// base HTML to be added to the bottom of a post
function moreposts_baseline_html() {
  //container
  $baseline  = '<section id="related-posts" class="related-posts">';
  $baseline .= '<a href="#" class="get-related-posts">Get related posts</a>';
  $baseline .= '<div class="ajax-loader"><img src="' . plugin_dir_url( __FILE__ ) . 'css/spinner.svg" width="32" height="32" /></div>';
  $baseline .= '</section><!-- .related-posts -->';

  return $baseline;
}


// adds above to the bottom of single posts.  this function runs the entire plugin
function moreposts_display($content) {
  if( is_single() && is_main_query() ) {
    //grabs the post content, append baseline to the content & return content using a filter
    $content .= moreposts_baseline_html();
  }
    return $content;
}
add_filter( 'the_content', 'moreposts_display');







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

// add various fields to the JSON output
function moreposts_register_fields() {
  // add author name
  register_api_field( 'post',
    'author_name',
    array(
      'get_callback'    =>'moreposts_get_author_name',
      'update_callback' => null,
      'schema'          => null
    )
  );
  // add featured image
  register_api_field( 'post',
    'featured_image_src',
    array(
      'get_callback'    =>'moreposts_get_image_src',
      'update_callback' => null,
      'schema'          => null
    )
  );
}

// get author name
function moreposts_get_author_name($object, $field_name, $request) {
  return get_the_author_meta( 'display_name' );
}

// get featured image
function moreposts_get_image_src($object, $field_name, $request) {
  $feat_img_array = wp_get_attachment_image_src( $object[ 'featured_image' ], 'thumbnail', true );
    return $feat_img_array[0];
}

add_action( 'rest_api_init', 'moreposts_register_fields');


// hook in all the important things
function moreposts_scripts() {
  // if single post & main query
  if( is_single() && is_main_query() ) {
    // get plugin stylesheet
    wp_enqueue_style( 'moreposts-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '0.1', 'all');
    // get javascript
    wp_enqueue_script( 'moreposts-script', plugin_dir_url( __FILE__) . 'js/moreposts.ajax.js', array('jquery'), '0.1', true );

    // get the current post ID
    global $post;
    $post_id = $post->ID;

    // using WP translation feature to pass values to the JS file
    wp_localize_script( 'moreposts-script', 'postdata', 
      array(
        'post_id' => $post_id,
        'json_url' => moreposts_get_json_query()
      )
    );

  }

}
add_action( 'wp_enqueue_scripts', 'moreposts_scripts' );


/**
 * Create REST API url
 * - Get the current categories
 * - Get the category IDs
 * - Create the arguments for categories and posts-per-page
 * - Create the url
 */
function moreposts_get_json_query() {

  // get all the categories in the current post
  $cats = get_the_category();

  // make an array of the categories
  $cat_ids = array();

  // loop through each of the categories and grab just the ID
  foreach ( $cats as $cat ) {
    $cat_ids[] = $cat->term_id;
  }

  // set up the query variable for category IDs and posts per page
  $args = array(
      'filter[cat]' => implode( ",", $cat_ids ),
      'filter[posts_per_page]' => 5
    );

  // put everything together in a URL
  $url = add_query_arg( $args, rest_url( 'wp/v2/posts') );

  return $url;

}

// base HTML to be added to the bottom of a post
function moreposts_baseline_html() {
  //container
  $baseline  = '<section id="related-posts" class="related-posts">';
  $baseline .= moreposts_get_json_query();
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







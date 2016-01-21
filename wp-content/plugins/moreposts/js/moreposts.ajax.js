/**
 * AJAX script for More Posts
 */

(function($) {
  $('.get-related-posts').on('click', function(event) {
    event.preventDefault();
    var json_url = postdata.json_url;
    var post_id = postdata.post_id;

    console.log(json_url);
    console.log(post_id);
  });
})(jQuery);
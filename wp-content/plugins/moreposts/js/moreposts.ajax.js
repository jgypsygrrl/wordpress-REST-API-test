/**
 * AJAX script for More Posts
 */

(function($) {
  $('.get-related-posts').on('click', function(event) {
    event.preventDefault();

    // remove button on click
    $('a.get-related-posts').remove();

    // loader appears on click
    $('.ajax-loader').show();

    // get REST URL and post ID from WP
    var json_url = postdata.json_url;
    var post_id = postdata.post_id;

    // AJAX
    $.ajax({
      dataType: 'json',
      url: json_url
    })

    .done(function(response) {

      // adds Related Post header
      $('#related-posts').append('<h1 class="related-header">Related Posts:</h1>');

      // loop through each of the related posts
      $.each(response, function(index, object) {

        // prevents current post to be listed
        if (object.id == post_id) {
          return;
        }

        var feat_img = '';

        // if there's a featured image, it will be added
        if (object.featured_image !== 0) {
          feat_img = '<figure class="related-featured">' +
            '<img src="' + object.featured_image_src + '" alt="">' +
            '</figure>';
        }

        // HTML to be added
        var related_loop = '<aside class="related-post clear">' +
          '<a href="' + object.link + '">' +
          '<h1 class="related-post-title">' + object.title.rendered + '</h1>' +
          '<div class="related-author">by <em>' + object.author_name + '</em></div>' +
          '<div class="related-excerpt">' +
          feat_img +
          object.excerpt.rendered +
          '</div>' +
          '</a>' +
          '</aside><!-- .related-post -->';

        // stop loader
        $('.ajax-loader').remove();

        // append HTML to existing content
        $('#related-posts').append(related_loop);
      });
    })

    .fail(function() {})

    .always(function() {});

  });
})(jQuery);
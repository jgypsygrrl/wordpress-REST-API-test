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

    // AJAX
    $.ajax({
      dataType: 'json',
      url: json_url
    })

    .done(function(response) {
      console.log(response);

      // loop through each of the related posts
      $.each(response, function(index, object) {

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

        // append HTML to existing content
        $('#related-posts').append(related_loop);
      });
    })

    .fail(function() {
      console.log('Fail!!!');
    })

    .always(function() {
      console.log("Complete");
    });

  });
})(jQuery);
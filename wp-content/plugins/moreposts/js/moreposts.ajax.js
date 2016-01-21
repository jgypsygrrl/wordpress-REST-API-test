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
        var related_loop =
          '<aside class="related-post clear">' +
          '<a href="' + object.link + '">' +
          '<h1 class="related-post-title">' + object.title.rendered + '</h1>' +
          '<div class="related-excerpt">' +
          object.excerpt.rendered +
          '</div>' +
          '</a>' +
          '</aside><!-- .related-post -->';

        $('#related-posts').append(related_loop);
      });
    })

    .fail(function() {
      console.log('Fail!!!');
    })

    .always(function() {
      console.log("Complete")
    });

  });
})(jQuery);
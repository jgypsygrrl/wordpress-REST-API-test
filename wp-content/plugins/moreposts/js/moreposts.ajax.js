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
        $('#related-posts').append('<h2>' + object.title.rendered + '</h2>')
      })
    })

    .fail(function() {
      console.log('Fail!!!');
    })

    .always(function() {
      console.log("Complete")
    });

  });
})(jQuery);
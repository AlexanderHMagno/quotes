
jQuery(document).ready(function () {


  //show a new quote every time we push the button. 
  jQuery('#quote-btn').on('click', function (event) {
    event.preventDefault();


    jQuery.ajax({
      method: 'GET',
      url: red_vars.rest_url + 'wp/v2/posts' +
        '?filter[orderby]=rand&filter[posts_per_page]=1',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    }).done(information => { fetch(information[0]); });
  });



  //Function that is called by the Ajax method GET in order to show data 

  function fetch(data) {

    let qContent = data.content.rendered;
    let qAuthor = data.title.rendered;
    let qSource = data['_qod_quote_source'];
    let qUrl = data['_qod_quote_source_url'];

    jQuery('#data-jQuery').html(qContent);
    if (qSource === '') {
      jQuery('#data-jQuery').append('- ' + qAuthor);
    }
    else {
      jQuery('#data-jQuery').append('<span>-' + qAuthor + ',  </span>');
    }

    jQuery('#data-jQuery').append('<a href="' + qUrl + '">' + qSource + '</a>');
    window.history.pushState(null, null, data.slug);
  }




  // Collect data and create a new post in the dataBase. 


  jQuery('.submit-btn').on('click', function () {

    jQuery.ajax({
      method: 'POST',
      url: red_vars.rest_url + 'wp/v2/posts',
      data: {
        content: jQuery('#quote').val(),
        title: jQuery('#author').val(),
        _qod_quote_source: jQuery('#sourceBook').val(),
        _qod_quote_source_url: jQuery('#sourceQuote').val(),
        post_status: 'draft'
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    }).done(function () {
      alert("Quote was created, thanks for your contribution");
      jQuery("#submit-info")[0].reset();
    }).fail(function () {
      alert("Attention, Quote was not submitted. Please try Again.");

    });

  });








  /*
      */


})

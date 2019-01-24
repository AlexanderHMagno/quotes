
jQuery( document ).ready(function() {
  
  jQuery('#quote-btn').on('click', function(event) {
    event.preventDefault();
    
    
    jQuery.ajax({
          method: 'GET',
          url: red_vars.rest_url + 'wp/v2/posts'+
          '?filter[orderby]=rand&filter[posts_per_page]=1',
          beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
             }}).done(information => { fetch(information);});
    });
  

    
function fetch(response){
  alert('its working');
  let data = response[0];
  let quoteResponse= data.content.rendered;
    let authorResponse = data.title.rendered;
    let qodResponse = data['_qod_quote_source'];
    let qodUrlhResponse =data['_qod_quote_source_url'];
    
    jQuery('#data-jQuery').html(quoteResponse);
    if(qodResponse===''){
        jQuery('#data-jQuery').append('-'+authorResponse);}
    else{
      jQuery('#data-jQuery').append('<span>-'+authorResponse+',  </span>');
        }

    jQuery('#data-jQuery').append('<a href="'+qodUrlhResponse+'">'+qodResponse+'</a>');
    window.history.pushState(null, null, data.slug);
  }








    function handle201() {
        alert('Success! Comments are upload.');
        
        // console.log(data.link);
    }

    jQuery('.submit-btn').on('click', function(event) {
      event.preventDefault();
     
      let nameAuthor = jQuery('#author').val();
      let nameQuote = jQuery('#quote').val();
      let sourceBook = jQuery('#sourceBook').val();
      let sourceURL = jQuery('#sourceQuote').val();

      jQuery.ajax({
        method: 'POST',
        url: red_vars.rest_url + 'wp/v2/posts',
        data:  {
          content: nameQuote,
          title: nameAuthor,
          _qod_quote_source: sourceBook,
          _qod_quote_source_url: sourceURL,
          post_status: 'draft'
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
        },
        statusCode: {
          201: handle201
        }
      }).fail(function(){
        
      });
    
    });







 
/*
    */
    
  
})

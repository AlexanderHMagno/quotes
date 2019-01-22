
jQuery( document ).ready(function() {
  
  jQuery('#quote-btn').on('click', function(event) {
    event.preventDefault();
    
    jQuery.ajax({
          method: 'GET',
          url: red_vars.rest_url + 'wp/v2/posts'+
          "?filter[orderby]=rand&filter[posts_per_page]=1"
          
          ,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
             }
       }).
    done(response => {
          fetch(response);
      });
    });
  



function fetch (response){
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


 
  
})

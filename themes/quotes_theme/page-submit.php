<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
			
    <?php the_title('<h1>','</h1>');?>


    <?php
if ( is_user_logged_in() ) {?>

    <form id="submit-info">
    <fieldset>
  <p>Author of Quote</p>
  <input  type="text" name="firstname" id="author">
  <br>
  <p>Quote</p>
  <textarea name="lastname" rows="10" cols="10" id="quote">
</textarea>
  <br>
  <p>Where did you find this quote? (e.g. book name)</p>
  <input type="text" name="source" id="sourceBook">
  <br>
  <p>Provide the URL of the quote source, if avalaible.</p>
  <input type="url" placeholder ="http://www.example.com" name="sourceURL" id="sourceQuote">
  <br> <br>
  <input type="button" class="submit-btn" value="Submit Quote">
  </fieldset>
</form>
		
<?php 
  
} else {
    
    echo 'Sorry, you must be logged in to submit a quote!';  ?>
    <p><a href="<? echo get_home_url();?> /wp-login.php">Click here to login.</a></p>
    <?php
}
?>

   

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

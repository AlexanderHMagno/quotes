<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<?php 

$source = get_post_meta( get_the_ID(), '_qod_quote_source', true );
$source_url = get_post_meta( get_the_ID(), '_qod_quote_source_url', true );

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
	<div class="entry-content" id="data-jQuery">
	<?php the_excerpt(); ?>
	<?php the_title('<span>- ','</span>');?>
	<a href="<?php echo $source_url;?>"><?php echo $source ;?></a>

    
	
	
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
	<div class="entry-content" id="data-jQuery">
	<?php the_excerpt(); ?>
	<?php the_title('<span>- ','</span>');?>
    
	
	
	</div><!-- .entry-content -->
</article><!-- #post-## -->

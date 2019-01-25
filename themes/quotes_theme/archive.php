<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title dotted-line">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ 

		;?>


            <?php 
            $args = array(
                'post_type'         => 'post', 
                'order'             => 'ASC', 
                'offset'            => '0',
                'posts_per_page'     => 5);
            $product_posts = get_posts($args);
			?>
		
             <ul>
            <?php foreach ( $product_posts as $post) : setup_postdata( $post);?>
			<div class="entry-content dotted-line" >
			<?php the_excerpt(); ?>
			<?php the_title('<span>-','</span>');?>
			</div>
			<?php endforeach; wp_reset_postdata();?>

			<?php qod_numbered_pagination(); ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

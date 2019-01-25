<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>

		<?php	$args = $args=array(
          'posts_per_page' => 1,
			'orderby' => 'rand',
		);
			$posts = get_posts($args);
    ?>

			<?php while ( have_posts($posts) ) : the_post(); ?>
			
				<?php get_template_part( 'template-parts/content' ); ?>
            
			<?php endwhile; ?>


		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		
	</main><!-- #main -->
	<div class="button-center">
				<button type="button" id="quote-btn">Show Me Another!</button>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>

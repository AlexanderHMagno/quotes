<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<i class="fas fa-quote-left quote-icon"></i>
	<i class="fas fa-quote-right quote-icon"></i>
		<main id="main" class="site-main" role="main">


<section class="authors">
       
	
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );?>
        <div class="journal-contenedor">
          
            <?php 
            $args = array(
                'post_type'         => 'post', 
                'order'             => 'DSC', 
                'offset'            => '0',
                'posts_per_page'     => -1);
            $product_posts = get_posts($args);
			?>
			<h2>Quote Authors</h2>
             <ul>
            <?php foreach ( $product_posts as $post) : setup_postdata( $post);?>
            <li><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></li>
              <?php endforeach; wp_reset_postdata();?>
			</ul>
             </div>


</section>


<section class="categories">
       
	 <div class="journal-contenedor">
          <?php
            $args = array(
                'post_type'         => 'post', 
                'order'             => 'DSC', 
                'offset'            => '0',
                'posts_per_page'     => -1);
			$product_posts = get_posts($args);
			$a=array();
			?>
			<h2>Categories</h2>
             <ul>
			<?php foreach ( $product_posts as $post) : setup_postdata( $post);?>
			
            <li><a href="<?php the_permalink();?>"><?php the_category() ; ?></a></li>
			  <?php endforeach; wp_reset_postdata();?>
			 
			</ul>
             </div>


</section>


<section class="tags">
       
	 <div class="journal-contenedor">
          <?php
            $args = array(
                'post_type'         => 'post', 
                'order'             => 'DSC', 
                'offset'            => '0',
                'posts_per_page'     => -1);
			$product_posts = get_posts($args);
			$a=array();
			?>
			<h2>Tags</h2>
             <ul>
			<?php foreach ( $product_posts as $post) : setup_postdata( $post);?>
			
            <li><a href="<?php the_permalink();?>"> <?php the_tags('',' '); ?></a></li>
			  <?php endforeach; wp_reset_postdata();?>
			 
			</ul>
             </div>


</section>


			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

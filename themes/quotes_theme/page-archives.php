<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">


<section class="authors">
       
	
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );?>
        <div class="journal-contenedor">
          
            <?php 
            $args = array(
                'post_type'         => 'post', 
                'order'             => 'ASC', 
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
<h2>Categories</h2>
<?php wp_list_categories('title_li=');?>
</div>

</section>


<section class="tags">
       
	 <div class="journal-contenedor">
	 <h2>Tags</h2>
<ul>
    <?php
    $tags = get_tags();
    if ( $tags ) :
        foreach ( $tags as $tag ) : ?>
            <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
             </div>


</section>


			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

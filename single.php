<?php get_header(); ?>  

  <div id="singlePage" class="wrapper">
    <div class="container_6">
    
    <!-- starta loopen -->
    <?php while ( have_posts() ) : the_post(); ?>
    
  		<article class="inside withPadding">
		    <?php echo get_the_post_thumbnail( $post_id, 'topImage', array( 'class' => 'topimg responsive' ) ) ?> 
  		  <div class="content">
  		    <?php the_dateIcon( $post ); ?>
    		  <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
  		    <div class="cats"><?php echo get_cat_list($post);  ?></div>
  		    <?php the_content() ?>
    		  <p class="text-right"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
    		  <div class="clear"></div>
  		  </div>
  		  
  		</article>
  		<div class="clear"></div>
    
    <?php endwhile; ?>

    </div>
    <div class="container_3"><div class="inside">
    		<?php get_sidebar(); ?>
    </div></div>
    <div class="clear"></div>
  </div>

<?php get_footer(); ?>
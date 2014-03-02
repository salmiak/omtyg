<?php get_header(); ?>  

  <div id="singlePage">
    
    <!-- starta loopen -->
    <?php while ( have_posts() ) : the_post(); ?>
    
      <article class="container"><div class="row">
        <?php if ( has_post_thumbnail()) {
         $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'fp_lg');
         echo '<div class="col-xs-12 col-sm-6 col-lg-5 col-lg-offset-1">';
         echo '<img src="' . $image_url[0] . '" width="'. $image_url[1] .'"  height="'. $image_url[2] .'" class="img-responsive" >';
         echo '</div>';
       } ?>
        <div class="col-xs-12 col-sm-6 col-lg-5">
          <h1 class="title capitals"><?php the_title() ?></h1>
          <div class="postContent"><?php the_content(); ?></div>
        </div>
      </div></article>
  		  
  		<div class="clear"></div>
    
    <?php endwhile; ?>

  </div>
  
<?php get_footer(); ?>
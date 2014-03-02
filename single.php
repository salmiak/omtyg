<?php get_header(); ?>  

  <div id="singlePost">
    
    <!-- starta loopen -->
    <?php while ( have_posts() ) : the_post(); ?>
    
  		<article class="imgPostContent">
  		
        <div id="imgCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
          <!-- Indicators -->
          <ol class="my-carousel-indicators carousel-indicators">
      		  <?php if( get_field('images') ):
      		    $index = 0;
      		    while( has_sub_field('images') ): ?>
      		      <li data-target="#imgCarousel" data-slide-to="<?php echo $index; ?>" class="<?php if($index==0) echo 'active'; ?>">
                  <img src="<?php echo get_sub_field('image')['sizes']['medium']; ?>" height="30px" />
                </li>
            	<?php $index++;
            	endwhile; ?>
            <?php endif; ?>
          </ol>
          
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
      		  <?php if( get_field('images') ):
      		    $index = 0;
      		    while( has_sub_field('images') ): ?>
      		      <div class="item <?php if($index==0) echo 'active'; ?>">
              		<div class="slideImg" style="background-image: url(<?php echo get_sub_field('image')['url']; ?>)"></div>
      		      </div>
            	<?php $index++;
            	endwhile; ?>
            <?php endif; ?>
          </div>
        
          <!-- Controls -->
          <a class="left carousel-control" href="#imgCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#imgCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        
        <?php $index = 0;
        if( get_field('images') ):
        while( has_sub_field('images') ): 
          if($index == 0) : ?>
          <img src="<?php echo get_sub_field('image')['url']; ?>" class="sizer img-responsive" />
          <?php endif;
          $index++; 
        endwhile; endif; ?>
        
  		</article>
    
		  <aside class="sidebar">
  		  <h1 class="title capitals"><?php the_title() ?></h1>
  		  <div class="postContent"><?php the_content(); ?></div>
  		  <div id="capCarousel" class="capSlider">
    		  <?php if( get_field('images') ): 
      		  $index = 0;
      		  while( has_sub_field('images') ): ?>
          		<div data-caption="<?php echo $index; ?>" class="imgCaption <?php if($index==0) echo 'active'; ?>"><?php the_sub_field('image_caption'); ?></div>
          	<?php $index++;
          	endwhile; ?>
          <?php endif; ?>
  		  </div>
		  </aside>
		  
  		  
  		<div class="clear"></div>
    
    <?php endwhile; ?>

  </div>
  
<?php get_footer(); ?>
<?php get_header(); ?>  

  <div id="singlePage">
    
    <!-- starta loopen -->
    <?php while ( have_posts() ) : the_post(); ?>
    
    
  		<article class="imgPostContent">
  		
        <div id="imgCarousel" class="carousel slide" data-ride="carousel" data-interval="10000" style="height: 100%;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
      		  <?php if( get_field('images') ):
      		    $index = 0;
      		    while( has_sub_field('images') ): ?>
                <li data-target="#imgCarousel" data-slide-to="<?php echo $index; ?>" class="<?php if($index==0) echo 'active'; ?>"></li>
            	<?php $index++;
            	endwhile; ?>
            <?php endif; ?>
          </ol>
          
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" style="height: 100%;">
      		  <?php if( get_field('images') ):
      		    $index = 0;
      		    while( has_sub_field('images') ): ?>
      		      <div class="item <?php if($index==0) echo 'active'; ?>" style="height:100%;">
              		<div class="slideImg" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
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
        
  		</article>
    	
		  <aside class="sidebar">
  		  <h1 class="title"><?php the_title() ?></h1>
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
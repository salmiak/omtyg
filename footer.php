
  <!--
  <footer id="sidfot" class="container" style="margin-top: 30px"><div class="col-xs-12">
    <p class="text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </div></footer><!-- slut sidfot-->
  
  <script src="//code.jquery.com/jquery-1.10.2.min.js" charset="utf-8"></script>
  <script src="http://underscorejs.org/underscore-min.js" charset="utf-8"></script>
  <script src="http://backbonejs.org/backbone-min.js" charset="utf-8"></script>
  <script> var baseUrl = '<?php bloginfo('url'); ?>'; </script>
  <script src="<?php bloginfo('template_url'); ?>/libs/imagesloaded.pkgd.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/libs/packery.pkgd.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  <?php if(is_front_page()) { ?><script src="<?php bloginfo('template_url'); ?>/js/frontpage.js" charset="utf-8"></script><?php } ?>
  <script src="<?php bloginfo('template_url'); ?>/js/omtyg.js" charset="utf-8"></script>
  <?php wp_footer(); ?>   

</body>
</html>
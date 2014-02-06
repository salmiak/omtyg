
  <!--
  <footer id="sidfot" class="container" style="margin-top: 30px"><div class="col-xs-12">
    <p class="text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </div></footer><!-- slut sidfot-->
  
  <script type="text/template" id="mainTemplate">
  
    <div class="container">
      <div class="row"><div class="col-xs-12"><h1 class="capitals text-green"><?php bloginfo('name') ?> <small class="italic non-capitals no-break"><?php bloginfo('description') ?></small></h1></div></div>
    </div>
      
    <div id="listContainer">
      <div class="gutter-sizer fp-col-sm"></div>
    </div>
      
    <div class="container text-center" style="margin-top: 30px">
      <button class="btn btn-default loadBtn">Load more</button>
    </div>
  </script>
  
  <script type="text/template" id="listPostTemplate">
    <% if( post_meta.fp_size[0] == 'fp_lg') { %>
    
      <div class="post fp-col-lg"><a href="<%= link %>">
        <div class="overlay"><h2><%= title %></h2></div>
        <img src="<%= featured_image.attachment_meta.sizes.fp_lg.url %>" width="<%= featured_image.attachment_meta.sizes.fp_lg.width %>" height="<%= featured_image.attachment_meta.sizes.fp_lg.height %>" class="abs-img-responsive" title="<%= title %>" />
      </a></div>
      
     <% } else { %>
     
      <div class="post fp-col-sm"><a href="<%= link %>">
        <div class="overlay"><h2><%= title %></h2></div>
        <img src="<%= featured_image.attachment_meta.sizes.fp_sm.url %>" width="<%= featured_image.attachment_meta.sizes.fp_sm.width %>" height="<%= featured_image.attachment_meta.sizes.fp_sm.height %>" class="abs-img-responsive" title="<%= title %>" />
      </a></div>
      
     <% } %>
  </script>
  
  <script src="//code.jquery.com/jquery-1.10.2.min.js" charset="utf-8"></script>
  <script src="http://underscorejs.org/underscore-min.js" charset="utf-8"></script>
  <script src="http://backbonejs.org/backbone-min.js" charset="utf-8"></script>
  <script>
    var baseUrl = '<?php bloginfo('url'); ?>';
  </script>
  <script src="<?php bloginfo('template_url'); ?>/libs/imagesloaded.pkgd.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/libs/packery.pkgd.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/omtyg.js" charset="utf-8"></script>
  <?php wp_footer(); ?>   

</body>
</html>
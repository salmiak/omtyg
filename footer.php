
  <footer id="sidfot" class="container">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </footer><!-- slut sidfot-->
  
  <script type="text/template" id="mainTemplate">
    <div class="container">
      <div class="row"><div class="col-xs-12"><h1>Omtyg</h1></div></div>
      
      <div id="listContainer" class="row"></div>
    </div>
  </script>
  
  <script type="text/template" id="listPostTemplate">
    <% if( post_meta.fp_size[0] == 'fp_lg') { %>
      <div class="post col-md-4 col-sm-6 col-xs-12">
        <!-- <h2><%=title%></h2> -->
        
        <!-- <% imagesObj = images.toJSON(); %>
        <% for(var i = 0; i < imagesObj.length; i++) { %>
          <img src="<%= imagesObj[i].attachment_meta.sizes.medium.url %>" width="<%= imagesObj[i].attachment_meta.sizes.medium.width %>" height="<%= imagesObj[i].attachment_meta.sizes.medium.height %>" title="<%= imagesObj[i].caption %>" /><br/>
        <% } %>-->
        
        <img src="<%= featured_image.attachment_meta.sizes.fp_lg.url %>" width="<%= featured_image.attachment_meta.sizes.fp_lg.width %>" height="<%= featured_image.attachment_meta.sizes.fp_lg.height %>" class="img-responsive" title="<%= title %>" />
        
      </div>
     <% } else { %>
      <div class="post col-md-2 col-sm-3 col-xs-6">
        <img src="<%= featured_image.attachment_meta.sizes.fp_sm.url %>" width="<%= featured_image.attachment_meta.sizes.fp_sm.width %>" height="<%= featured_image.attachment_meta.sizes.fp_sm.height %>" class="img-responsive" title="<%= title %>" />
      </div>
     <% } %>
  </script>
  
  <script src="//code.jquery.com/jquery-1.10.2.min.js" charset="utf-8"></script>
  <script src="http://underscorejs.org/underscore-min.js" charset="utf-8"></script>
  <script src="http://backbonejs.org/backbone-min.js" charset="utf-8"></script>
  <script>
    var baseUrl = '<?php bloginfo('url'); ?>';
  </script>
  <script src="<?php bloginfo('template_url'); ?>/libs/masonry.pkgd.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/omtyg.js" charset="utf-8"></script>
  <?php wp_footer(); ?>   

</body>
</html>
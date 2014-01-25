
  <footer id="sidfot">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </footer><!-- slut sidfot-->
  
  <script type="text/template" id="mainTemplate">
    <div class="container">
      <div id="listContainer"></div>
    </div>
  </script>
  
  <script type="text/template" id="listPostTemplate">
    <div class="post">
      <h2><%=title%></h2>
      <!-- <% imagesObj = images.toJSON(); %>
      <% for(var i = 0; i < imagesObj.length; i++) { %>
        <img src="<%= imagesObj[i].attachment_meta.sizes.medium.url %>" width="<%= imagesObj[i].attachment_meta.sizes.medium.width %>" height="<%= imagesObj[i].attachment_meta.sizes.medium.height %>" title="<%= imagesObj[i].caption %>" /><br/>
      <% } %>-->
      <img src="<%= featured_image.attachment_meta.sizes.medium.url %>" width="<%= featured_image.attachment_meta.sizes.medium.width %>" height="<%= featured_image.attachment_meta.sizes.medium.height %>" title="<%= title %>" />
      
    </div>
  </script>
  
  <script src="//code.jquery.com/jquery-1.10.2.min.js" charset="utf-8"></script>
  <script src="http://underscorejs.org/underscore-min.js" charset="utf-8"></script>
  <script src="http://backbonejs.org/backbone-min.js" charset="utf-8"></script>
  <script>
    var baseUrl = '<?php bloginfo('url'); ?>';
  </script>
  <script src="<?php bloginfo('template_url'); ?>/js/omtyg.js" charset="utf-8"></script>
  <?php wp_footer(); ?>   

</body>
</html>
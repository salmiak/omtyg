<?php get_header(); ?>	

	<div id="main">
    <p class="text-center text-muted sans-serif capitals">Loading...</p>
	</div><!-- slut main -->

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

<?php get_footer(); ?>
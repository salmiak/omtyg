<?php get_header(); ?>

	<div id="frontPage">
    <p class="text-center text-muted sans-serif capitals text-green" style="line-height: 80vh; opacity: 0.15; font-size:40px; font-weight:900;"><img src="<?php bloginfo('template_url'); ?>/img/ajax-loader.gif" style="vertical-align: baseline; height: 30px; margin: 0px 10px 0 0;"/>Laddar Omtyg<img src="<?php bloginfo('template_url'); ?>/img/ajax-loader.gif" style="vertical-align: baseline; height: 30px; margin: 0px 0 0 5px;"/></p>
	</div><!-- slut main -->

  <footer id="footer" class="container"><div class="col-xs-12">
    <p class="text-center text-green sans-serif capitals">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.facebook.com/omtyg" target="_blank">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://instagram.com/omtyg.se" target="_blank">Instagram</a></p>
  </div></footer><!-- slut sidfot-->

  <script type="text/template" id="mainTemplate">
    <div class="container">
      <div class="row"><div class="col-xs-12"><div class="frontPageHeader border-bottom">
        <h1 class="frontpageTitle capitals text-green text-center"><?php bloginfo('name') ?></h1>
        <p class="capitals no-break text-center text-green" style="margin: 0px;"><?php bloginfo('description') ?></p>
      </div></div></div>
    </div>

    <div id="listContainer">
      <div class="gutter-sizer fp-col-sm"></div>
    </div>

    <div class="container text-center" style="margin-top: 30px">
      <button class="btn btn-default loadBtn">Ladda fler inlägg</button>
    </div>
  </script>

  <script type="text/template" id="listPostTemplate">

    <% if( m.post_meta.fp_size[0] == 'fp_lg') { %>

      <div class="post fp-col-lg <%= (m.post_meta && m.post_meta.forSale && m.post_meta.forSale[0]=='1'?'forSale':'') %>"><a href="<%= m.link %>">
        <div class="overlay <%= (s.isPage?'isPage':'') %>"><h2 class="capitals text-center"><%= m.title %></h2></div>
        <img src="<%= m.featured_image.attachment_meta.sizes.fp_lg.url %>" width="<%= m.featured_image.attachment_meta.sizes.fp_lg.width %>" height="<%= m.featured_image.attachment_meta.sizes.fp_lg.height %>" class="abs-img-responsive" title="<%= m.title %>" />
      </a></div>

    <% } else { %>

      <div class="post fp-col-sm <%= (m.post_meta && m.post_meta.forSale && m.post_meta.forSale[0]=='1'?'forSale':'') %>"><a href="<%= m.link %>">
        <div class="overlay <%= (s.isPage?'isPage':'') %>"><h2 class="capitals text-center"><%= m.title %></h2></div>
        <img src="<%= m.featured_image.attachment_meta.sizes.fp_sm.url %>" width="<%= m.featured_image.attachment_meta.sizes.fp_sm.width %>" height="<%= m.featured_image.attachment_meta.sizes.fp_sm.height %>" class="abs-img-responsive" title="<%= m.title %>" />
      </a></div>

    <% } %>
  </script>

<?php get_footer(); ?>
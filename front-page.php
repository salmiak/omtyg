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

    <% if( m.omtyg_fp_size == 'fp_lg') { %>

      <div class="post fp-col-lg <%= (m.omtyg_forSale?'forSale':'') %>"><a href="<%= m.link %>">
        <div class="overlay <%= (s.isPage?'isPage':'') %>"><h2 class="capitals text-center"><%= m.title %></h2></div>
        <% if (m.featured_image) {  %>
          <img src="<%= m.featured_image.attachment_meta.sizes.fp_lg.url %>" width="<%= m.featured_image.attachment_meta.sizes.fp_lg.width %>" height="<%= m.featured_image.attachment_meta.sizes.fp_lg.height %>" class="abs-img-responsive" title="<%= m.title %>" />
        <% } else { %>
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAIAAADZSiLoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjFCRUNERjk3MjhGMTFFNEEyODlENjg0QTBGQjBENjYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjFCRUNERkE3MjhGMTFFNEEyODlENjg0QTBGQjBENjYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyMUJFQ0RGNzcyOEYxMUU0QTI4OUQ2ODRBMEZCMEQ2NiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyMUJFQ0RGODcyOEYxMUU0QTI4OUQ2ODRBMEZCMEQ2NiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pr2rBz8AAAAVSURBVHjaYpTzZIAAJgYGDBZAgAEAC9oAbbTPDGUAAAAASUVORK5CYII="  width="300" height="300" class="abs-img-responsive" />
        <% } %>
      </a></div>

    <% } else { %>

      <div class="post fp-col-sm <%= (m.omtyg_forSale?'forSale':'') %>"><a href="<%= m.link %>">
        <div class="overlay <%= (s.isPage?'isPage':'') %>"><h2 class="capitals text-center"><%= m.title %></h2></div>
        <% if (m.featured_image) {  %>
          <img src="<%= m.featured_image.attachment_meta.sizes.fp_sm.url %>" width="<%= m.featured_image.attachment_meta.sizes.fp_sm.width %>" height="<%= m.featured_image.attachment_meta.sizes.fp_sm.height %>" class="abs-img-responsive" title="<%= m.title %>" />
        <% } else { %>
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAIAAADZSiLoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjFCRUNERjk3MjhGMTFFNEEyODlENjg0QTBGQjBENjYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjFCRUNERkE3MjhGMTFFNEEyODlENjg0QTBGQjBENjYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyMUJFQ0RGNzcyOEYxMUU0QTI4OUQ2ODRBMEZCMEQ2NiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyMUJFQ0RGODcyOEYxMUU0QTI4OUQ2ODRBMEZCMEQ2NiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pr2rBz8AAAAVSURBVHjaYpTzZIAAJgYGDBZAgAEAC9oAbbTPDGUAAAAASUVORK5CYII="  width="300" height="300" class="abs-img-responsive" />
        <% } %>
      </a></div>

    <% } %>
  </script>

<?php get_footer(); ?>
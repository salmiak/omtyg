// *** TEMPLATES ***
var mainTemplate = _.template($('#mainTemplate').html());
var listPostTemplate = _.template($('#listPostTemplate').html());

// *** MODELS ***
// Post Model
var Post = Backbone.Model.extend({
  idAttribute: 'ID',
  urlRoot: baseUrl + '/wp-json.php/posts',
  parse: function(d){
    d.images = new Medium();
    for (var i in d.omtyg_post_images){
      var media = new Media(d.omtyg_post_images[i].image);
      media.set('caption',d.omtyg_post_images[i].image_caption);
      d.images.add(media);
    }
    return d;
  }
});
var Page = Post.extend({
  urlRoot: baseUrl + '/wp-json/pages',
});
// Media Model
var Media = Backbone.Model.extend({
  idAttribute: 'id',
  urlRoot: baseUrl + '/wp-json/media',
  parse: function(d){
    d.id = d.ID;
    return d;
  }
});

// *** COLLECTIONS ***
// Posts Collection
var Posts = Backbone.Collection.extend({
  model: Post,
  url: baseUrl + '/wp-json/posts',
})
// Posts Collection
var Pages = Backbone.Collection.extend({
  model: Page,
  url: baseUrl + '/wp-json/pages',
})
// Posts Collection
var Medium = Backbone.Collection.extend({
  model: Media,
  url: baseUrl + '/wp-json/media'
})

// *** VIEWS ***
// Post List View
var ListView = Backbone.View.extend({
  initialize: function(o){
    this.index = 0;
    this.pages = o.pages||null;
  },
  el: '#frontPage',
  render: function(){
    var that = this;

    this.$el.html( mainTemplate() );

    this.$('#listContainer').packery({
      columnWidth: ".gutter-sizer",
      itemSelector: '.post',
      gutter: 0
    });

    $(document).endlessScroll({
      bottomPixels: 800,
      callback: function(){
        that.showMoreCards();
      }
    })

    this.showMoreCards();
  },
  showMoreCards: function(){

    var that = this;
    var increase = 10;

    // Element array that will be pushed to packery.js
    var newEls = [];

    // Get pages to display before posts and show them - only run on first call when index is 0
    if(this.index == 0) {
      var pages = this.pages.filter(function(p){ return p.get('post_meta') && parseInt( p.get('post_meta').index[0] ) == 0; });
      if(pages) {
        for(var j in pages) {
          $p = $(listPostTemplate( {m:pages[j].toJSON(), s:{isPage:true} } ))
          this.$('#listContainer').append( $p );
          newEls.push($p[0]);
        }
      }
    }

    for(var i = this.index; i < Math.min(this.index + increase, this.collection.length); i++) {

      // Add post
      var $e = $(listPostTemplate( {m:this.collection.at(i).toJSON(), s:{isPage:false} } ));
      this.$('#listContainer').append( $e );
      newEls.push($e[0]);

      // Get eventual pages on this index and add them
      var pages = this.pages.filter(function(p){ return p.get('post_meta') && parseInt( p.get('post_meta').index[0] ) == i+1; });
      if(pages) {
        for(var j in pages) {
          $p = $(listPostTemplate( {m:pages[j].toJSON(), s:{isPage:true} } ))
          this.$('#listContainer').append( $p );
          newEls.push($p[0]);
        }
      }

    }
    this.$('#listContainer').packery('appended', newEls);
    this.$('#listContainer').imagesLoaded(function(){
      that.$('#listContainer').packery();
    });

    this.index += increase;
    if (this.collection.length < this.index)
      this.$('.loadBtn').remove();
  },
  events: {
    'click .loadBtn' : 'showMoreCards'
  }
})

// *** ROUTER ***

var Router = Backbone.Router.extend({
  routes: {
    '*default'           : 'list'
  },
  list: function(){

    // Will run on third execution
    var renderList = _.after(2, function(a){
      var listView = new ListView({
        collection: posts,
        pages: pages
      });
      listView.render();
    });

    posts.fetch({
      success: renderList
    });
    pages.fetch({
      success: renderList
    });
  },
})

// *** RUNTIME ***
var posts = new Posts();
var pages = new Pages();
var router = new Router();

$(function(){
  Backbone.history.start()
})
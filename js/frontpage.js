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
    for (var i=0; i < d.post_meta.images; i++){
      var media = medium.get(d.post_meta['images_'+i+'_image']);
      if(media) {
        media.set('caption',d.post_meta['images_'+i+'_image_caption'][0]);
        d.images.add(media);
      }
    }
    return d;
  }
});
var Page = Post.extend();
// Media Model
var Media = Backbone.Model.extend({
  idAttribute: 'ID',
  urlRoot: baseUrl + '/wp-json.php/media'
});

// *** COLLECTIONS ***
// Posts Collection
var Posts = Backbone.Collection.extend({
  model: Post,
  url: baseUrl + '/wp-json.php/posts',
})
// Posts Collection
var Pages = Backbone.Collection.extend({
  model: Page,
  url: baseUrl + '/wp-json.php/pages',
})
// Posts Collection
var Medium = Backbone.Collection.extend({
  model: Media,
  url: baseUrl + '/wp-json.php/media'
})

// *** VIEWS ***
// Post List View
var ListView = Backbone.View.extend({
  initialize: function(o){
    this.index = 0;
    this.pages = o.pages||null;
    console.log(this.pages)
  },
  el: '#main',
  render: function(){
    this.$el.html( mainTemplate() );
    
    this.$('#listContainer').packery({
      columnWidth: ".gutter-sizer",
      itemSelector: '.post',
      gutter: 0
    });
    
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
          $p = $(listPostTemplate( pages[j].toJSON() ))
          this.$('#listContainer').append( $p );
          newEls.push($p[0]);
        }
      }
    }
    
    for(var i = this.index; i < Math.min(this.index + increase, this.collection.length); i++) {
    
      // Add post
      var $e = $(listPostTemplate( this.collection.at(i).toJSON() ));
      this.$('#listContainer').append( $e );
      newEls.push($e[0]);
      
      // Get eventual pages on this index and add them
      var pages = this.pages.filter(function(p){ return p.get('post_meta') && parseInt( p.get('post_meta').index[0] ) == i+1; });
      if(pages) {
        for(var j in pages) {
          $p = $(listPostTemplate( pages[j].toJSON() ))
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
    '*deafult'           : 'list'
  },
  list: function(){
    
    // Will run on third execution
    var renderList = _.after(3, function(a){
      console.log(a);          
      var listView = new ListView({
        collection: posts,
        pages: pages
      });
      listView.render();
    });
    
  	medium.fetch({
      success: renderList
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
var medium = new Medium();
var router = new Router();
  
$(function(){
  Backbone.history.start()
})
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
var Medium = Backbone.Collection.extend({
  model: Media,
  url: baseUrl + '/wp-json.php/media'
})

// *** VIEWS ***
// Post List View
var ListView = Backbone.View.extend({
  initialize: function(){
    this.index = 0;
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
    var increase = 15;
    
    var newEls = [];
    for(var i = this.index; i < Math.min(this.index + increase, this.collection.length); i++) {
      var $e = $(listPostTemplate( this.collection.at(i).toJSON() ));
      this.$('#listContainer').append( $e );
      newEls.push($e[0]);
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
    //'post/:slug'  : 'post',
    '*deafult'           : 'list'
  },
  /*
  post: function(slug){
  	medium.fetch({
      success: function(a){
        posts.fetch({
          success: function(a){
          
            console.log(a);
          
            var listView = new ListView({collection: a});
            listView.render();
          }
        })
      }
    })
  },
  */
  list: function(){
  	medium.fetch({
      success: function(a){
        posts.fetch({
          success: function(a){
          
            console.log(a);
          
            var listView = new ListView({collection: a});
            listView.render();
          }
        })
      }
    })
  },
})

// *** RUNTIME ***
var posts = new Posts();
var medium = new Medium();
var router = new Router();
  
$(function(){
  Backbone.history.start()
  
  
  $(function(){
    $('#imgCarousel').on('slide.bs.carousel', function (a) {
      // Fade out caption on slide
      $('.capSlider .active').fadeOut().removeClass('active');
    })
    $('#imgCarousel').on('slid.bs.carousel', function (a) {
      // Fade in caption on slid
      $('.capSlider [data-caption="' + $('#imgCarousel .active').index('#imgCarousel .item') + '"]').addClass('active').fadeIn(100);
      console.log( $('#imgCarousel .active').index('#imgCarousel .item') );
    })
  });
})
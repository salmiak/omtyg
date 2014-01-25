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
      media.set('caption',d.post_meta['images_'+i+'_image_caption'][0]);
      d.images.add(media);
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
    this.showMoreCards();
  },
  showMoreCards: function(){
    var that = this;
    for(var i = this.index; i < Math.min(this.index + 40, this.collection.length); i++) {
      this.$('#listContainer').append( listPostTemplate( this.collection.at(i).toJSON() ) );
    }
      
    // FIXME: trigger on correct timing.
    setTimeout(function(){
      that.$('#listContainer').masonry({
        itemSelector: '.post'
      });
    }, 30);
  }
})

// *** RUNTIME ***
var posts = new Posts();
var medium = new Medium();
  
$(function(){
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
})
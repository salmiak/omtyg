// Run slider on post and pages
$(function(){
  $('#imgCarousel').on('slide.bs.carousel', function (a) {
    // Fade out caption on slide
    $('.capSlider .active').fadeOut().removeClass('active');
  });
  $('#imgCarousel').on('slid.bs.carousel', function (a) {
    // Fade in caption on slid
    $('.capSlider [data-caption="' + $('#imgCarousel .active').index('#imgCarousel .item') + '"]').addClass('active').fadeIn(100);
  });
  
  $('body').on('keydown', function(e){
    if (e.keyCode == 37) { 
       $('#imgCarousel').carousel('prev');
       return false;
    }
    if (e.keyCode == 39) { 
       $('#imgCarousel').carousel('next');
       return false;
    }
  })
});
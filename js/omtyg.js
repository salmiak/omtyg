// Run slider on post and pages
$(function(){
  $('#imgCarousel').on('slide.bs.carousel', function (a) {
    // Fade out caption on slide
    $('.capSlider .active').fadeOut().removeClass('active');
  })
  $('#imgCarousel').on('slid.bs.carousel', function (a) {
    // Fade in caption on slid
    $('.capSlider [data-caption="' + $('#imgCarousel .active').index('#imgCarousel .item') + '"]').addClass('active').fadeIn(100);
  })
});
$(document).ready( function() {
    $('.carousel').carousel();
    $('#myCarousel').on('slide.bs.carousel', function(e) {
        var from = $('.nav-pills li.active').index();
        var next = $(e.relatedTarget);
        var to =  next.index();
      
        $('.nav-pills li').removeClass('active').eq(to).addClass('active');
    });
});
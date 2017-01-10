var initNav = function() {
 $('.Navigation li').on('click', function(){
    var data = $(this).data('tab');
     var newTab = $('.main[data-uri='+data+']');

     $('.main').removeClass('open');
     newTab.addClass('open');

     $('.Navigation li').removeClass('is-active');
     $(this).addClass('is-active');

 });
}

$(document).ready(function () {
 initNav();
})
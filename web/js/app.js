var initNav = function () {
    $('.Navigation li').on('click', function () {
        var data = $(this).data('tab');
        var newTab = $('.main[data-uri=' + data + ']');

        $('.main').removeClass('open');
        newTab.addClass('open');

        $('.Navigation li').removeClass('is-active');
        $(this).addClass('is-active');

    });
}

$(document).ready(function () {
    initNav();

    if ($('.Form-01').length) {

        $('.Form-01 input').blur(function () {
            var $this = $(this);
            if ($this.val())
                $this.addClass('used');
            else
                $this.removeClass('used');
        });

    }


    if ($('.Accordion').length) {
        $('.Accordion .Flex-container').on('click', function () {


            var content = $(this).parent().find('.Accordion-content');

            if(content.hasClass('is-visible')){
                content.removeClass('is-visible');
                $(this).removeClass('focus');

            }else{
                $('.Accordion .Flex-container').removeClass('focus');
                $(this).addClass('focus');
                $('.Accordion-content').removeClass('is-visible');
                content.addClass('is-visible');

            }
        });
    }
})
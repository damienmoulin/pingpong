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


    if($('.Round-item ').length) {
        $('.Round-item .two-row td').on('mouseover', function () {
            $(this).find('span').css('bottom','4px');
        });

        $('.Round-item .two-row td').on('mouseout', function () {
            $(this).find('span').css('bottom','-100px');
        })
    }

    if($('.translate-zone').length) {

        var widthItem = 0;
        var nb1 = 0;

        var sliderInit = function(nb, $slider) {


            var max = parseInt(nb) - 3;

            $slider.find('.range').attr('max',max);

            $slider.find('.range').on('input change', function (e) {

                $that = $slider.prev().find('.translate-zone .scroll-right');
                x = $(this).val();

                var translate = widthItem * x;
                var test = parseInt(x) - 2;
                var xInt = parseInt(x) + 3;

                if( x < nb) {

                    $translatezone = $slider.prev().find('.translate-zone').addClass('is-slide');

                    $that.off('mousemove');

                    $slider.prev().find('.translate-zone').css('transform','translate(-'+translate+'px)');

                    setTimeout(function () {

                        $('.is-slide .Round-item').removeClass('scroll-right')
                        $('.is-slide .Round-item:nth-child('+xInt+')').addClass('scroll-right');
                        goright();
                        goleft();

                    }, 300)
                }

            })
        }

        $.each($('.Rounds-items'), function (i,e) {
            nb1 = $(e).find('.Round-item').length;
            widthItem = $(e).find('.Round-item').width();

            if(nb1 > 3) {
                var SliderSize = nb * widthItem + 100;

                $(e).css('width', SliderSize);

                $(e).find('.Round-item:nth-child(3)').addClass('scroll-right');
                $(e).find('.Round-item:nth-child(1)').addClass('scroll-left');

                var $slider = $(e).parent().next();

                sliderInit(nb1, $slider);
            }else{
                $('.Slide').css('display','none');
            }
            

        });


        var goright = function(){
            $('.translate-zone .scroll-right').on('mousemove', function (e) {

                $this = $(this);

                $this.parent().addClass('is-drag');
                $that = $('.translate-zone.is-drag .scroll-right');
                x = $('.translate-zone.is-drag .scroll-right').index();

                var translate = widthItem * x;

                var nb = $('.translate-zone.is-drag .Round-item').length;

                $('.is-drag').removeClass('is-drag');

                if(e.offsetX > 300 && x < nb) {

                    $this.parent().addClass('is-drag');
                    var $that = $('.translate-zone.is-drag .scroll-right');

                    $that.off('mousemove');

                    $this.parent().css('transform','translate(-'+translate+'px)');

                    setTimeout(function () {

                        if( x + 1 == nb) {

                            $this.last().addClass('scroll-left');
                            $this.last().removeClass('scroll-right');

                        } else {

                            $that.removeClass('scroll-right');
                            $that.next().next().addClass('scroll-right');

                            $('.is-drag .scroll-left').removeClass('scroll-left');
                            $('.is-drag .scroll-right').prev().prev().addClass('scroll-left');
                        }

                        goright();
                        goleft();

                        var range = parseInt(x) - 1.1;

                        var slider = $this.parent().parent().next().find('.range');
                        slider[0].value = range;

                        $('.is-drag').removeClass('is-drag');

                    }, 300)
                }
            });
        }

        if(nb1 > 3) {
            goright();
        }

        var goleft = function(){
            $('.translate-zone .scroll-left').on('mousemove', function (e) {

                $this = $(this);
                $this.parent().addClass('is-drag');

                var $that = $('.translate-zone.is-drag .scroll-left');
                x = $('.translate-zone.is-drag .scroll-left').index();

                var nb = $('.translate-zone.is-drag .Round-item').length;

                $('.is-drag').removeClass('is-drag');

                if(e.offsetX < 50 && x > 0) {

                    $this.parent().addClass('is-drag');

                    $that = $('.translate-zone.is-drag .scroll-left');


                    $that.off('mousemove');

                    if(x == 2){
                        x = 0;
                    }

                    var translate = widthItem * x;

                    $this.parent().css('transform','translate('+translate+'px)');

                    setTimeout(function () {

                        $that.removeClass('scroll-left');
                        $that.prev().prev().addClass('scroll-left');

                        $('.is-drag .scroll-right').removeClass('scroll-right');
                        $('.is-drag .scroll-left').next().next().addClass('scroll-right');

                        $('.is-drag').removeClass('is-drag');

                        goleft();
                        goright();

                        var range = parseInt(x) - 1.5;

                        var slider = $this.parent().parent().next().find('.range');
                        slider[0].value = parseInt(range);
                    }, 300)
                }
            });
        }

        if(nb1 > 3){
            goleft();
        }

    }


    $('.hamburger').on('click', function () {
        $('.menu-1').toggleClass('menu--active');
    });

    $('.account.connexion').on('click', function(){
        $('.btn.participate').trigger('click')
    });

    $('.account.inscription').on('click', function(){
        $('#modal-inscription').css('z-index','0');
        $('.btn.inscription').trigger('click');

        $('.close').off('click').on('click', function(){
            $('#modal-inscription').css('z-index','1050');
        })
    });


    $('.Gestion .choose').on('mouseover', function(){

        if($(this).prev().hasClass('is-choose')){

        }else{
            $(this).prev().addClass('is-active');
        }

        return false;
    })

    $('.Gestion .choose').on('mouseout', function(){

        if($(this).prev().hasClass('is-choose')){

        }else {
            $(this).prev().removeClass('is-active');
        }
        return false;
    })

    $('.Gestion .choose').on('click', function(e){
        
        $(e).preventDefault;
        $('.Gestion-container').removeClass('is-active is-choose');


        $(this).prev().addClass('is-active is-choose');


        var val = $(this).data('val');
        $('#nbpartf').attr("value",val);

        $('.Gestion .choose').off('mouseout');
        $('.Gestion .choose').off('mouseover');

        setTimeout(function(){
            $('.Gestion .choose').on('mouseover', function(){

                if($(this).prev().hasClass('is-choose')){

                }else{
                    $(this).prev().addClass('is-active');
                }

                return false;
            })

            $('.Gestion .choose').on('mouseout', function(){

                if($(this).prev().hasClass('is-choose')){

                }else {
                    $(this).prev().removeClass('is-active');
                }
                return false;
            })
        }, 700);

        return false;
        
    });

    $('.find_t').on('click', function(){
        var teamname = $('input.find_tournament').val();
        $(location).attr('href', Routing.generate('contest_find', { teamname: teamname}));
    })
})
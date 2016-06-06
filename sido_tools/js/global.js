
                    $(function(){
                            var iOS = false;
                            var ua = navigator.userAgent;
                            var uaindex;
                            var userOSver;
                            if ( ua.match(/iPad/i) || ua.match(/iPhone/i) ){
                                    iOS = true;
                                    uaindex = ua.indexOf( 'OS ' );
                            }
                            if ( iOS  &&  uaindex > -1 ){
                                    userOSver = ua.substr( uaindex + 3, 3 ).replace( '_', '' );
                                    if(userOSver<10) userOSver=userOSver*100;
                                    else if(userOSver<100) userOSver=userOSver*10;
                                    if(userOSver<820) {
                                            $('.tag_size_text').css('font-size', '4vw');
                                    }
                            }
                    })
                    $(document).ready(function(){
                        $('.home_slider').slick({
                            autoplaySpeed: 4000,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            autoplay: true,
                            dots: true,
                            arrows:false,
                            prevArrow:'<div class="prev_btn_feat icon_panah_slide_left_feat"></div>',
                            nextArrow:'<div class="next_btn_feat icon_panah_slide_right_feat"></div>'
                            
                        });
                        $('.announcement_slider').slick({
                            autoplaySpeed: 2000,
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                            arrows:true,
                            prevArrow:'<div class="prev_btn_feat icon_panah_slide_left_feat"></div>',
                            nextArrow:'<div class="next_btn_feat icon_panah_slide_right_feat"></div>',
                            responsive: [
                            {
                            breakpoint: 1250,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 1060,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 820,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 650,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 420,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false
                            }
                            }

                            ]
                        });
                        $('.product_slider').slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            infinite: true,
                            autoplay: false,
                            autoplaySpeed: 2000,
                            arrows:true,
                            prevArrow:'<div class="prev_btn_product icon_panah_slide_left_product"></div>',
                            nextArrow:'<div class="next_btn_product icon_panah_slide_right_product"></div>',
                            responsive: [
                            {
                            breakpoint: 1250,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 1060,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 820,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 650,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 420,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false
                            }
                            }

                            ]
                        });
                        $('.testimonial_slider').slick({
                            speed: 300,
                            infinite: true,
                            dots: false,
                            arrows:true,
                            prevArrow:'<div class="prev_btn_testi icon_panah_slide_left"></div>',
                            nextArrow:'<div class="next_btn_testi icon_panah_slide_right"></div>'
                        });
                         $('.first_slider').slick({
                            speed: 300,
                            infinite: true,
                            dots: true,
                            arrows:true,
                            prevArrow:'<div class="prev_btn icon_panah_slide_left"></div>',
                            nextArrow:'<div class="next_btn icon_panah_slide_right"></div>'
                        });
                        $(document).on('click','.loadmore',function(){
                            //$('.loadmore').hide();
                            //$('#loading').show();
                            $("#form_load").ajaxForm({
                            success:function(e){
//                                alert(e);
//                                $("#data_news").append(e);
                                //$('#loading').hide();
                                var t=$("#news_id").val();
                                var $boxes = $(e);
                                var $container = $('#data_news');
                                $container.append( $boxes ).isotope( 'appended', $boxes, true );
                            if(e==""){
                                $(".loadmore").hide()
                            }
                            }}).submit()
                        });
                        $('#click_menu').click(function(){
                           
                                var $t = $('#content_menu');
                                if ($t.is(':visible')) {
                                    $t.slideUp();
                                    $('#click_menu').addClass('box_menu_first');
                                    $('#click_menu').removeClass('box_menu_first_no_border');
                                } else {
                                    $t.slideDown();
                                    $('#click_menu').removeClass('box_menu_first');
                                    $('#click_menu').addClass('box_menu_first_no_border');
                                }

                        });

//                        $('#click_menu').mouseenter(function(){
//                            $('#content_menu').stop().slideUp(500);
//                        });
//                            $('.image_fix').scrollToFixed({
//                            // marginTop: $('.header').outerHeight(true) + 10,
//                                limit: function() {
//                                    var limit = $('#line_area').offset().top - $('.image_fix').outerHeight(true) - 10;
//                                    return limit;
//                                },
//                                minWidth: 1000,
//                                zIndex: 999,
//                                fixed: function() {  },
//                                dontCheckForPositionFixedSupport: true
//                            });

                          
                     
                   });
                   jQuery(document).ready(function( $ ) {
                        $('.counter').counterUp({
                            delay: 20,
                            time: 1000
                        });
                    });
                 
$(function () {
    floating_object();
});

function floating_object(){
   /* var length = $('#ceo').height() + $('#box_height').offset().top;*/
    var length = $('#box_height').height() - $('#ceo').height() + $('#box_height').offset().top;
    if($(window).width()>=1025){
        $(window).scroll(function () {

            var scroll = $(this).scrollTop();
            var height = $('#ceo').height() + 'px';
            var display_width = $(window).width();
            var box_width = $('#box_height').width();
            var right_distance = (display_width - box_width) / 2 ;
            if (scroll < $('#box_height').offset().top) {
                $('#ceo').css({
                    'position': 'absolute',
                    'top': '0',
                    'right':'0'
                });

            } else if (scroll > length) {

                $('#ceo').css({
                    'position': 'absolute',
                    'bottom': '0',
                    'top': 'auto',
                    'right':'0'
                });

            } else {
                
                $('#ceo').css({
                    'position': 'fixed',
                    'top': '0',
                    'right':right_distance
    //                'right':'185px'
                });

            }
        });
    }else{
           $(window).scroll(function () {
            var scroll = $(this).scrollTop();
            var height = $('#ceo').height() + 'px';

            if (scroll < $('#box_height').offset().top) {

                $('#ceo').css({
                    'position': 'relative',
                    'width': '181px',
                    'margin':'0px auto'
                });

            }
        });
    }
}

var current_width = $(window).width();
$(window).resize( $.throttle( 250, function() {
    if ($(window).width() != current_width){
        window.location.href = "";
    }
}));
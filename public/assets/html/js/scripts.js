$(function(){
    var aos = $('[data-aos]');
    if (!aos.length) return;
    AOS.init({
        duration: 900,
        offset: 80
    });
})

/* Animation */

function animation() {
    var animateEl = $('.js-animate');

    if (!animateEl.length) return;

    animateEl.each(function(index, el) {
        var waypoint = new Waypoint({
            element: el,
            handler: function() {
                var element = $(this.element),
                delay = element.attr('data-delay');
                setTimeout(function() {
                    element.addClass('_active');
                }, delay || 0);
                this.destroy();
            },
            offset: '100%'
        });
   });
}animation();

$(function(){
    var formSend = $('.js-formsend');
    if (!formSend.length) return;
    $.validator.setDefaults({
        debug: true,
        success: 'valid'
    });
    $.validator.addMethod("validate_phone", function(value, element) {
        if (value.length == 18) {
            return true;
        } else {
            return false;
        }
    }, "Пожалуйста, введите корректный телефон");
    $.validator.addMethod("validate_email", function(value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Пожалуйста, введите корректный email");
    formSend.validate({
        errorClass: '_error',
        validClass: '_valid',
        ignore: [],
        rules: {
            phone: {
                // required: true,
                // minlength: 10,
                // maxlength: 20,
                require_from_group: [1, '.js-contact-group']
            },
            email: {
                // validate_email: true,
                require_from_group: [1, '.js-contact-group']
            },
        },
        errorPlacement: function(error, element) {
            element.attr("data-placeholder", error.text());
        },
        submitHandler: function(form) {
            var myForm = $(form);
            var data = myForm.serialize();
            var getFormAction = myForm.attr('action');
            var method = myForm.attr('method');
            var goodSend = myForm.data('result');
            $.ajax({
                type: method,
                url: getFormAction,
                data: data,
                success: function() {
                    $('.js-modal').removeClass('_active');
                    $(goodSend).addClass('_active');
                    myForm.find('input:not([name="_token"])').val('');
                },
                error:  function(error){

                    console.log(error)

                }
            });
        }
    });
});

$(function(){
    var header = $('.js-header-fixed');
    if (!header.length) return;
    $(window).on('scroll', function(){
        if ($(window).scrollTop() > 300) {
            header.addClass('_active');
        } else {
            header.removeClass('_active');
        }
    })
})

$(function(){
    $('.js-menu-link').on('click', function(){
        var _this = $(this);
        var link = _this.attr('href');
        $('.js-nav-mob').removeClass('_active');
        $("body, html, document").animate({
            scrollTop: $(link).offset().top
        }, 500);
    })
})

$(function(){
    $('.js-menu-nav').on('click', function(){
        var _this = $(this);
        var link = _this.attr('href');
        $('.js-nav-mob').removeClass('_active');
        $('body').removeClass('_noscroll');
        setTimeout(function(){
            $("body, html, document").animate({
                scrollTop: $(link).offset().top
            }, 500);
        }, 500)
    })
})

$(function(){
    $('.js-modal-link').on('click', function(){
        showModal($(this).data('id'));
    })
    function showModal(id) {
        $('.js-modal-overlay').addClass('_active');
        $('body').addClass('_noscroll');
        $(id).addClass('_active');
        if ($(id).find('.js-modal-content').outerHeight() < $(window).height()) {
            $(id).find('.js-modal-content').addClass('_middle');
        }
        $('.js-nav-mob').removeClass('_active');
    }
    function closeModal() {
        $('.js-modal-overlay').removeClass('_active');
        $('body').removeClass('_noscroll');
        $('.js-modal').removeClass('_active');
        $('.js-modal-content').removeClass('_active');
    }
    $('.js-modal-close').on('click', function(){
        closeModal();
    })

})

$(function(){
    $('.js-nav-mob-close').on('click', function(){
        $('.js-nav-mob').removeClass('_active');
        $('body').removeClass('_noscroll');
    })
    $('.js-nav-mob-link').on('click', function(){
        $('.js-nav-mob').addClass('_active');
        $('body').addClass('_noscroll');
    })
})

$(window).bind('scroll',function(e){
    parallaxScroll();
});

function parallaxScroll(){
    var scrolled = $(window).scrollTop();
    $('.js-parallax-bg-top').css('transform', 'translateY('+(0-(scrolled*.10))+'px)');
    $('.js-parallax-bg-bottom').css('transform', 'translateY('+(0-(scrolled*.10))+'px)');
}

$(function(){
    var phone = $('.js-phone');
    if (!phone.length) return;

    var phones = document.querySelectorAll('.js-phone');

    // for (var i = 0; i < phones.length; i++) {
    //     IMask(phones[i], {
    //       mask: '+{7} (000) 000-00-00'
    //     });
    // }
})

$(function(){
    $('.js-scroll-head').on('click', function(){
        var _this = $(this);
        $("body, html, document").animate({
            scrollTop: 0
        }, 500);
    })
})

$(function(){
    var servicesSlider = $('.js-services-slider');

    if (!servicesSlider.length) return;

    var breakpoint = window.matchMedia( '(max-width: 575px)' );
    var servicesSliderSwiper;

    var breakpointChecker = function() {

       if ( breakpoint.matches === true ) {

           return enableSliderSwiper();

       } else if ( breakpoint.matches === false ) {

             if ( servicesSliderSwiper !== undefined ) servicesSliderSwiper.destroy( true, true );

             return;

       }

    };
    var enableSliderSwiper = function() {

        servicesSliderSwiper = new Swiper('.js-services-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            // autoHeight: true,
            centeredSlides: true,
            slideToClickedSlide: true,
            loop: true
        });
        $(window).resize(function(){
            servicesSliderSwiper.update(true);
        })
    };
    breakpoint.addListener(breakpointChecker);

    breakpointChecker();

})

$(function(){
    var solutionsSlider = $('.js-solutions-slider');

    if (!solutionsSlider.length) return;

    var breakpoint = window.matchMedia( '(max-width: 575px)' );
    var solutionsSliderSwiper;

    var breakpointChecker = function() {

       if ( breakpoint.matches === true ) {

           return enableSliderSwiper();

       } else if ( breakpoint.matches === false ) {

             if ( solutionsSliderSwiper !== undefined ) solutionsSliderSwiper.destroy( true, true );

             return;

       }

    };
    var enableSliderSwiper = function() {

        solutionsSliderSwiper = new Swiper('.js-solutions-slider', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            // autoHeight: true,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true
        });
        $(window).resize(function(){
            solutionsSliderSwiper.update(true);
        })
    };
    breakpoint.addListener(breakpointChecker);

    breakpointChecker();

})

$(function(){
    var stepsSlider = $('.js-steps-slider');

    if (!stepsSlider.length) return;

    var stepsSliderSwiper = new Swiper('.js-steps-slider', {
        // loop: false,
        // grabCursor: true,
        navigation: {
            nextEl: '.js-steps-slider-next',
            prevEl: '.js-steps-slider-prev',
        },
        pagination: {
            el: '.js-steps-slider-pagination',
            type: 'fraction'
        },
        speed: 1000,
        effect: 'fade'
    });
})

$(function(){
    var el = $('#main-box-bg');
    if (!el.length) return;
    var mainBg = new Vivus('main-box-bg', {duration: 200})
    el.addClass('_active');
    mainBg.play();
})

$(function() {
    var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
    if (isIE11) {
        $('html').addClass('this-ie');
    }
})

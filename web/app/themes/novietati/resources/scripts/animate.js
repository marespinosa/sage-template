$(() => {


    //Animte    
    var animate = $('.animate');

    $.animateScroll = () => {
        var windowHeight = $(window).height();
        var windowTopPosition = $(window).scrollTop();
        var windowBottomPosition = windowTopPosition + windowHeight;

        animate.each(function(index, element) {
            var $element = $(element);
            var top = $element.offset().top;
            if ($element.hasClass('hide') && top <= windowBottomPosition) {
                var delay = parseInt($element.attr('animate-delay'));

                if (delay) {
                    setTimeout(() => {
                        $element.removeClass('hide');
                    }, delay);
                } else {
                    $element.removeClass('hide');
                }

            }
        });
    }

});
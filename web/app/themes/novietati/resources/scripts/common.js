$(() => {

    // Add Link effect from image on Editor
    $.checkAlinksWithImage = () => {
        $link = $('.entry-content a:not(.button):not(.button-outline):not(.button-secondary):not(.button-secondary-outline) img');

        $link.each((key, el) => {

            var attr = $(el).parent().attr('data-toggle');
            if (!(typeof attr !== 'undefined' && attr !== false)) {
                $(el).parent().addClass('has-image');
            }
        })
    }

    //Post - Progress Bar
    var articleTop, docBottom, windowHeight;
    $.progressBar = () => {
        return false;
    };

    if ($('.article-content').length) {
        articleTop = $('.article-content').offset().top - 184;
        windowHeight = $(window).height();
        docBottom = $('.article-content').height() - (windowHeight * .30);

        $.progressBar = () => {

            if ($(window).scrollTop() > articleTop) {
                $temp = ($(window).scrollTop()) - articleTop;
                scrollPercent = ($temp / docBottom) * 100;
            } else {
                scrollPercent = 0;
            }

            $('#progress').width(scrollPercent + '%');
        };
    }

    //Accordion
    $('.accordion-loop-item .accordion-loop-item-title').on('click', e => {

        const $currentTarget = $(e.currentTarget);
        $currentTarget.toggleClass('active');
        $currentTarget.parent().find('.accordion-loop-item-content').slideToggle('fast');

    });

    //Menu
    var menuClick = true;
    $('.mobile-menu-icon').on('click', () => {
        if (menuClick) {
            menuClick = false;

            if ($('#mobile-menu').hasClass('active')) {
                $('html').removeClass('no-scroll');
                $('#mobile-menu').removeClass('active');
            } else {
                $('html').addClass('no-scroll');

                setTimeout(() => {
                    $('#mobile-menu').addClass('active');
                }, 100);
            }

            setTimeout(() => {
                menuClick = true;
            }, 300);

        }
    });

    //Submenu
    $('#mobile-menu .menu-item-has-children > a').on('click', e => {
        if (!$(e.currentTarget).hasClass('clickable') && !$(e.currentTarget.parentElement).hasClass('clickable')) {
            e.preventDefault();
            $(e.currentTarget).addClass('clickable');
            $(e.currentTarget).parent().find('.sub-menu').slideDown();
        }

    });

    //Hide Header in Footer
    $.hideHeaderInFooter = () => {
        var windowHeight = $(window).height();
        var windowTopPosition = $(window).scrollTop();
        var windowBottomPosition = windowTopPosition + windowHeight;
        var hasClass = $('#main-header').hasClass('hide-header');

        if (hasClass) {
            if (windowBottomPosition < $('#main-footer').offset().top) {
                $('#main-header').removeClass('hide-header');
            }
        } else {
            if (windowBottomPosition > $('#main-footer').offset().top) {
                $('#main-header').addClass('hide-header');
            }
        }
    }

});
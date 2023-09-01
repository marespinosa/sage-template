import wpSanitizeTitle from '../wp-sanitizetitle'

$(() => {

    // Vars    
    var tableOfContentFlag = true;
    const headerHeight = $('#main-header').height() + 20;

    //Post - Add Id to H2 - H3
    // function convertToSlug(Text) {
    //     return Text.toLowerCase()
    //         .replace(/[^\w ]+/g, '')
    //         .replace(/ +/g, '-');
    // }
    $('.article-content .entry-content :header').map((key, element) => {
        const target = $(element);

        const tag = target.prop("tagName");

        if (tag.toLowerCase() == 'h1' || tag.toLowerCase() == 'h2' || tag.toLowerCase() == 'h3') {

            target.attr('id', wpSanitizeTitle(target.html()) + '-' + item);
            target.addClass('table-of-content-title-check');
            item++;
        }
    });

    //Post - Scroll Table Content
    $('.table-of-content-item').on('click', e => {

        const target = $(e.currentTarget);

        if (tableOfContentFlag && target.hasClass('opacity-80')) {
            console.log('test');
            tableOfContentFlag = !tableOfContentFlag;
            const $link = target.attr("data-goto");

            selectTableContentItem(target);

            $('html, body').animate({
                scrollTop: $('#' + $link).offset().top - headerHeight,
            });
            setTimeout(() => {
                tableOfContentFlag = !tableOfContentFlag;
            }, 300);
        }
    });

    //Post - Check if The focus  is on the Title and activate on sidebar
    $.anchorScrollCheck = () => {
        if (tableOfContentFlag) {
            var windscroll = $(window).scrollTop() + headerHeight + 10;
            $('.table-of-content-title-check').each(function (i) {
                var posTop = $(this).position().top,
                    h = $(this).height();

                var href = $(this).attr('id');

                if (posTop <= windscroll && posTop + h > windscroll) {
                    selectTableContentItem($('.table-of-content-item.' + href));
                } else {
                    // $('.archor-menu-loop-item[href="#' + href + '"]').removeClass('active');
                }
            });
        }
    }

});

function selectTableContentItem(target) {
    $('.table-of-content-item').addClass('opacity-80');
    target.removeClass('opacity-80');
}
$(() => {

    //create index
    var index = 0;
    $('.gallery-item').each(function(index, element) {
        $(element).attr('data-index', index)
    });

    // Init empty gallery array
    let galleryArray = [];

    // Loop over gallery items and push it to the array
    $('.gallery-item').each(function() {
        var $link = $(this).find('a'),
            $img = $(this).find('img'),
            item = {
                src: $link.attr('href'),
                w: $link.attr('data-width'),
                h: $link.attr('data-height'),
                title: $img.attr('title') ? $img.attr('title') : ''
            };
        galleryArray.push(item);
    });

    // Define click event on gallery item
    $('.gallery-item').on('click', function(event) {

        // Prevent location change
        event.preventDefault();

        // Define object and gallery options
        var $pswp = $('.pswp')[0],
            options = {
                index: parseInt($(event.currentTarget).attr('data-index')),
                bgOpacity: 0.85,
                showHideOpacity: true
            };

        // Initialize PhotoSwipe
        var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, galleryArray, options);
        gallery.init();
    });
});
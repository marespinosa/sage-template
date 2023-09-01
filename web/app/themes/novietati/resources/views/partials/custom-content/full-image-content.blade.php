<section id="section-{!! $key !!}"
    class="acf-fc-layout acf-fc-layout-full-image-content section-page {!! $section['image_position'] == 'right' ? 'row-reverse' : '' !!} image-aspect-{!! $section['image_aspect'] !!} animate hide">
    <figure class="thumbnail-holder w-full lg:w-1/2 aspect-{!! $section['image_aspect'] !!}">
        {!! get_image_with_focus_on($section['image'], 'thumbnail', 'massive'); !!}
    </figure>
    <div
        class="container flex {{ 
            isset($section['image_position']) && $section['image_position'] === 'right' ? 'justify-end' : 
            (isset($section['image_position']) && $section['image_position'] === 'center' ? 'justify-center' : 'justify-right') 
        }} items-center">
        <div class="entry-content w-full lg:w-5/12 text-white ">
            {!! $section['content'] !!}
        </div>
    </div>
</section>
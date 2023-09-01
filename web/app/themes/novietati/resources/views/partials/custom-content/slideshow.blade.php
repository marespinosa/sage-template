@php
$image_size = my_wp_is_mobile() ? 'medium' : 'large';
@endphp
<section id="section-{!! $key !!}" class="acf-fc-layout acf-fc-layout-slideshow section-page animate hide container ">

    {{-- Title --}}
    @if (!empty($section['title']))
    <h2 class="mb-12 text-center">{!! $section['title'] !!}</h2>
    @endif

    <div class="slideshow-container relative">
        <div
            class="slideshow-navigation flex justify-between items-center absolute top-1/2 left-0 w-full -translate-y-1/2">
            @svg('/images/slideshow-nav-left.svg', ['slideshow-nav-left slideshow-button slideshow-button-prev
            transition-3s'])
            @svg('/images/slideshow-nav-right.svg', ['slideshow-nav-right slideshow-button slideshow-button-next
            transition-3s'])
        </div>
        {{-- Images --}}
        <div class="slideshow-loop mx-0 md:mx-32" data-speed="{!! $section['autoplay_speed'] !!}"
            data-animation="{!! $section['animation'] !!}">
            @foreach ($section['images'] as $item)
            <div class="slideshow-loop-item image-fit-{!! $section['image_fit'] !!}">
                @if (!empty($item['link']['url']))
                <a href="{!! $item['link']['url'] !!}" title="{!! $item['link']['title'] !!}"
                    aria-label="{!! $item['link']['title'] !!}">
                    @endif
                    {!! get_image_with_focus_on($item['image'], 'mx-auto', $image_size); !!}
                    @if (!empty($item['link']['url']))
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    @if (!empty($section['cta']['url']))
    <p class="text-center mt-14">
        <a class="button" href="{!! $section['cta']['url'] !!}" target="{!! $section['cta']['target'] !!}">{!!
            $section['cta']['title']
            !!}</a>
    </p>
    @endif
</section>
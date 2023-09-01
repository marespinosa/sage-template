@php

$image = $col['image'];


@endphp


<figure class="acf-multi-column acf-multi-column-image thumbnail-holder rounded-lg overflow-hidden relative">
    {!! get_image_with_focus_on($image, 'thumbnail transition-3s', 'large'); !!}

    @if (isset($col['link']['url']))
    <a href="{!! $col['link']['url'] !!}" target="{!! $col['link']['target'] !!}" class="link-overlay z-20">{!!
        $col['link']['title']
        !!}</a>
    <a href="{!! $col['link']['url'] !!}" target="{!! $col['link']['target'] !!}"
        class="link-title absolute  left-1/2 -translate-x-1/2 translate-y-1/2 button z-30 text-lg">{!!
        $col['link']['title']
        !!}</a>
    @endif
</figure>
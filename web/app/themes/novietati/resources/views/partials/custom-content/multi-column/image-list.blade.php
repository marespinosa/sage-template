<div class="acf-multi-column acf-multi-column-image-list">
    @foreach ($col['items'] as $key => $item)
    <div class="hover-items items-center @if($key != 0) mt-5  @endif">

        <figure class="hover-figure object-center <?php echo esc_attr($round_image); ?>">
            {!! get_image_with_focus_on($item['image'], 'full', 'thumbnail'); !!}
        </figure>

        <div class="inner-info ">
            <h5 class="mb-2 pb-2 ">
                    <strong>{!! $item['title'] !!}</strong>
            </h5>
                <p class="mb-0 break-spaces leading-8">{!! $item['description'] !!}</p>
                @if(!empty($item['link']))
                <p class="mt-2">
                    <a href="{!! $item['link']['url'] !!}" class="link-on-hover underline underline-offset-1 ">{!!
                        $item['link']['title'] !!}</a>
                </p>
                @endif
        </div>
       
    </div>
    @endforeach
</div>


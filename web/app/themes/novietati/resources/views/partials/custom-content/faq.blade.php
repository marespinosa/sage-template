<section id="section-{!! $key !!}" class="acf-fc-layout acf-fc-layout-faq animate hide container section-page">
    @if (isset($section['heading']) && !empty($section['heading']))
    <div class="entry-content">
        {!! $section['heading'] !!}
    </div>
    @endif

    @if (isset($section['faq_list']) && !empty($section['faq_list']))
    <div class="accordion-loop">
        @foreach ($section['faq_list'] as $item)
        <div class="accordion-loop-item relative mb-4">
            <p class="accordion-loop-item-title mr-4"><strong>{!! $item['question'] !!}</strong></p>
            <div class="accordion-loop-item-content pb-4 entry-content">
                {!! $item['answer'] !!}
            </div>
        </div>
        @endforeach
    </div>

    @endif
</section>

@php(create_faq_schema($section['faq_list']))
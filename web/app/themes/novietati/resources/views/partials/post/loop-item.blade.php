<div class="post-loop-item animate hide mb-12">
    <a href="{!! $link !!}" class="thumbnail-holder aspect-video">
        {!! $featuredImageMedium !!}
    </a>
    <div class="post-loop-item-content mt-3 px-4">
        {{-- @include('partials.post.entry-meta') --}}
        @include('partials.post.entry-categories')
        <h2 class="title paragraph-text-medium mt-2"><a class="link-on-hover" href="{!! $link !!}">{!! $title !!}</a></h2>
        {!! $excerpt !!}
    </div>
</div>
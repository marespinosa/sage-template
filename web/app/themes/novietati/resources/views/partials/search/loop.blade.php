<div class="search-loop container mb-16 lg:mb-28 grid lg:grid-cols-2 gap-x-10">
    @foreach ($query as $post)
    @php(setup_postdata($GLOBALS['post'] = $post))
    @include('partials.search.loop-item')
    @php(wp_reset_postdata())
    @endforeach
</div>
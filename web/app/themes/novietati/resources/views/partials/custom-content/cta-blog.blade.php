<section id="section-{!! $key !!}" class="acf-fc-layout acf-fc-layout-cta-blog section-page animate hide">
    <div class="container">
        <h2 class="text-center mb-12">{!! $section['title'] !!}</h2>
        <div class=" align-start grid md:grid-cols-2 lg:grid-cols-4 mb-10 gap-5">
            @foreach (App\View\Composers\Post::shortLoop() as $post)
            @php(setup_postdata($GLOBALS['post'] = $post))
            @include('partials.post.loop-item')
            @php(wp_reset_postdata())
            @endforeach
        </div>
        <p class="text-center">
            <a class="button" href="{!! App\View\Composers\App::pageForPosts() !!}">Click here to view more posts</a>
        </p>
    </div>
</section>
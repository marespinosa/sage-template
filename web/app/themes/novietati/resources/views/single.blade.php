@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header.post')
<article class="article-content mb-28 container block lg:flex items-start flex-row-reverse">
    <div class="entry-content w-full">
        @php(the_content())
    </div>
    @include('partials.post.sidebar')
</article>
<div class="container mb-28 flex justify-center ">
    <div class=" w-full lg:w-8/12">
        @include('partials.post.author-profile')
    </div>
</div>
@endwhile
@endsection
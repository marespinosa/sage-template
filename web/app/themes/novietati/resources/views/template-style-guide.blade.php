{{--
Template Name: Style Guide
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header')
<div class="style-guide">
    @include('partials.style-guide.colour-palette')
</div>
@endwhile
@endsection
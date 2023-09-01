{{--
Template Name: Woo Cart
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header.woo')
@include('woocommerce.global.process-bar')
<div class="container mb-28">
    {!! do_shortcode('[woocommerce_cart]') !!}
</div>
@include('partials.custom-content.loop')
@endwhile
@endsection
{{--
Template Name: Woo My Account
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header.woo')
<div class="container mb-28">
    {!! do_shortcode('[woocommerce_my_account]') !!}
</div>
@include('partials.custom-content.loop')
@endwhile
@endsection
{{--
The Template for displaying all single products

This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce\Templates
@version 1.6.4
--}}

@php 
$page_title = get_the_title();

@endphp




@extends('layouts.app')

<div class="absolute overflow-hidden w-full overlay-header md:h-60 lg:h-80 product-header-h">
    {!!$headershopbanner!!}
</div>

@section('content')

<h2 class="relative text-center pt-8 single-page-title">{!!$page_title!!}</h2>

<div class="relative breadcrumbs text-center m-0 mr-auto ml-auto overflow-hidden lg:w-2/4 sm:w-3/4 ">
    <?php if(is_woocommerce()): ?>

    <?php woocommerce_breadcrumb(); ?>

<?php endif; ?>
</div>


<div class="container mb-28 md:mt-40 relative ">
    @while(have_posts())
    @php
    the_post();
    wc_get_template_part('content', 'single-product');
    @endphp
    @endwhile

    @php
    do_action('woocommerce_after_main_content');
    do_action('get_footer', 'shop');
    @endphp
</div>
@endsection
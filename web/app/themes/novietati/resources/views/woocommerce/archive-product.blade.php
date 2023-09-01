{{--
The Template for displaying product archives, including the main shop page which is a post type archive

This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.4.0
--}}


@extends('layouts.app')

@section('content')

<div class="text-center header-wrapper h-52 bg-no-repeat bg-top bg-cover overlay-header">

    <div class="absolute h-52 overflow-hidden w-full">
        {!!$headershopbanner!!}
    </div>

        @if (apply_filters('woocommerce_show_page_title', true))
        <h1 class="woocommerce-products-header__title page-title color-black-font pt-11 relative z-10">{!! woocommerce_page_title(false) !!}</h1>
        @endif

        @php
        do_action('woocommerce_archive_description')
        @endphp

        @php
        do_action('woocommerce_before_main_content');
        @endphp
    </div>
</div>

<div class="container mb-28 mt-14">

    <div class="lg:flex prod-terms">
        
        <div class="sideBarCategories text-left">
            <h6>Categories</h6> 
            <?php
            $args = array(
                'taxonomy' => 'product_cat',
                'title_li' => '',
                'show_count' => 1,
            );
            add_filter('wp_list_categories', 'customize_category_output', 10, 2);
            wp_list_categories($args);
            remove_filter('wp_list_categories', 'customize_category_output', 10);
            ?>
        </div>

        
        @if (woocommerce_product_loop())
        <?php do_action('woocommerce_before_shop_loop'); ?>

        <?php do_action('woocommerce_before_shop_loop_flex') ?>

        <?php woocommerce_product_loop_start(); ?>

        @if (wc_get_loop_prop('total'))
            @while (have_posts())
            @php
                the_post();
                do_action('woocommerce_shop_loop');
                wc_get_template_part('content', 'product');
            @endphp
            @endwhile
        @endif


        @else
            @php
            do_action('woocommerce_no_products_found')
            @endphp
        @endif

        @php
            do_action('woocommerce_after_main_content');
        @endphp
        @endsection

    </div>




    
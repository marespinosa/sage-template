<?php

namespace App;

/*
 * Product Loop List.
 */

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_shop_loop_flex', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop_flex', 'woocommerce_catalog_ordering', 30);

/*
 * Product Loop Items.
 */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

$woocommerce_template_single_excerpt_pos = wp_is_mobile() ? 12 : 10;

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_status', 6);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_status', 6);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', $woocommerce_template_single_excerpt_pos);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 11);

/*
 * Cart.
 */

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// add_action( 'woocommerce_cart_cross_sell_display', 'woocommerce_cross_sell_display', 5 );

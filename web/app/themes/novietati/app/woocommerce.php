<?php

/*
 * Product
 */

//  Get Product Status

function get_product_status($product_id = false)
{

    if ($product_id) {
        $product = new WC_Product(10);
    } else {
        global $product;
    }

    $status = $product->get_availability();

    return '<span class="product-availability ' . $status['class'] . '">' . (empty($status['availability']) ? 'In Stock' : $status['availability']) . '</span>';
}

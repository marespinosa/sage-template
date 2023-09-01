<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Woo extends Composer
{
    protected static $views = [
        'woocommerce.archive-product',
        'woocommerce.single-product',
        'template-woo-cart',
        'template-woo-my-acount',
        'template-woo-checkout',
    ];

    public function with()
    {

        return [
            'title' => $this->title(),
            'cartCount' => $this->cartCount(),
            'headershopbanner' => $this->headershopbanner(),

        ];
    }

    public function title()
    {
        return get_the_title();
    }

    public function cartCount()
    {
        return WC()->cart->cart_contents_count;
    }
    public function headershopbanner()
    {
        $shoppagesbanner = get_field('shop_pages_banner', 'option');

        return get_image_with_focus_on($shoppagesbanner, 'h-52 w-full', 'large');
    }

}

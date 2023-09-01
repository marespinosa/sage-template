<div class="cart-checkout-process-bar hidden md:grid grid-cols-3 container mb-11 xl:mb-24">
    <a href="{!! wc_get_cart_url() !!}" class="flex items-center cart-checkout-process-bar-item pb-4 active">
        {{-- <img src="@asset('images/check-mark.png')" class="flex-shrink-0 mr-4" width="32" height="32" /> --}}
        @svg('images/check-mark', ['flex-shrink-0 mr-4'])
        <span>
            <strong class="block">SHOPPING BAG</strong>
            <small class="block">View your items</small>
        </span>
    </a>
    <a href="{!! wc_get_checkout_url() !!}"
        class="flex items-center cart-checkout-process-bar-item pb-4 {{ !(is_page( 'cart' ) || is_cart()) ? 'active' : '' }}">
        {{-- <img src="@asset('images/' . (!(is_page( 'cart' ) || is_cart()) ? 'check-mark' : 'mark-2') . '.png')"
            class="flex-shrink-0 mr-4" width="32" height="32" /> --}}
        @if (!(is_page( 'cart' ) || is_cart()))
        @svg('images/check-mark', ['flex-shrink-0 mr-4'])
        @else
        @svg('images/mark-2', ['flex-shrink-0 mr-4 opacity-30'])
        @endif
        <span>
            <strong class="block">SHIPPING AND CHECKOUT</strong>
            <small class="block">Enter your details</small>
        </span>
    </a>
    <span
        class="flex items-center cart-checkout-process-bar-item pb-4 {{ (is_checkout() && !empty( is_wc_endpoint_url('order-received') )) ? 'active' : '' }}">
        {{-- <img
            src="@asset('images/' . ((is_checkout() && !empty( is_wc_endpoint_url('order-received') )) ? 'check-mark' : 'mark-3') . '.png')"
            class="flex-shrink-0 mr-4" width="32" height="32" /> --}}
        @if ((is_checkout() && !empty( is_wc_endpoint_url('order-received') )))
        @svg('images/check-mark', ['flex-shrink-0 mr-4'])
        @else
        @svg('images/mark-3', ['flex-shrink-0 mr-4 opacity-30'])
        @endif
        <span>
            <strong class="block">COMFIRMATION</strong>
            <small class="block">Review your order!</small>
        </span>
    </span>
</div>
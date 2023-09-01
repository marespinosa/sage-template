<nav class="flex sm:hidden items-center">
    {{-- <a href="{!! get_permalink(get_option('woocommerce_myaccount_page_id')) !!}"
        class="block woo-nav-shopping-myaccount ">
        <img src="@asset('images/woocommerce/shopping-myaccount.png')" class="mx-auto" width="32" height="32"
            alt="My account  Icon" />
        <small class="title uppercase">{!! is_user_logged_in() ? 'My Account' : 'Sign in' !!}</small>
    </a> --}}
    <a href="{!! wc_get_cart_url() !!}" class="block woo-nav-shopping-cart relative">
        @svg('images.woocommerce.cart', ['w-5 h-5 mx-auto color-text transition-3s'])
        <span class="title uppercase block text-center">Cart</span>
    </a>
</nav>
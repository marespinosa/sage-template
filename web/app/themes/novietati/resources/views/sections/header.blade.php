<header id="main-header" class="main-header w-full  z-30 transition-3s md:h-16 lg:h-32">
    <div class="items-center justify-between h-full">

        @if (is_woocommerce_activated() && wp_is_mobile())
        @include('sections.header.woo-header-mobile')
        @endif

        @if (isset($headerLogo) && !empty($headerLogo))
    <div class="border-bottom pb-2">
        <div class="container">
            <a class="brand mt-0 mb-0 mx-auto align-middle text-center block w-52" href="{{ home_url('/') }}">
                {!! $headerLogo !!}
            </a>
        </div>
    </div>
        @endif


        @if (is_woocommerce_activated())
    <div class="border-top">
        <div class="container">
            <div class="items-center mt-0 mb-0 mx-auto align-middle text-center block w-fit">
                @include('sections.header.menu')
                @include('sections.header.woo-header')
            </div>
        </div>
    </div>
        @else
        @include('sections.header.menu')
        @endif
    </div>
    @include('sections.header.post-progress-bar')
</header>
@include('sections.header.mobile-menu')
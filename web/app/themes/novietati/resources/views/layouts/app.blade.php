<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header')

<main id="main" class="main">

    @if ( post_password_required() )
    @include('partials.password-protect.form')
    @else
    @yield('content')
    @endif
</main>

@include('partials.photoswipe-structure')
@include('sections.footer')
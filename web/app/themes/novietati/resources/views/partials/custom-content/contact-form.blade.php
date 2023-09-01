


<section id="section-{!! $key !!}" class="acf-fc-layout acf-fc-layout-contact-form section-page animate hide container 
                    grid md:grid-cols-2 gap-20 mt-16">

    <div class="border-top">
        @if (!empty($section['content']))
        <div class="entry-content border-top md:pb-10 lg:pb-20 ">
            {!! $section['content'] !!}
        </div>
        @endif

        @if ($address)
        <p class="flex items-start mb-8 ">
            {{-- <img src="@asset('images/location.png')" width="36px" height="36px" alt="Address Pin" class="mr-4" />
            --}}
            @svg('images/location', ['mr-4 w-9 h-9 fill-main-brand'])
            <span class="break-spaces paragraph-text-medium">{!! $address !!}</span>
        </p>
        @endif
        @if ($email)
        <p class="flex items-center mb-8 ">
            {{-- <img src="@asset('images/email.png')" width="36px" height="36px" alt="email Pin" class="mr-4" /> --}}
            @svg('images/email', ['mr-4 w-9 h-9 fill-main-brand'])
            <a href="mailto:{!! $email !!}" class="paragraph-text-medium link-on-hover">{!! $email !!}</a>
        </p>
        @endif
        @if ($phoneNumber)
        <p class="flex items-center mb-8">
            {{-- <img src="@asset('images/phone.png')" width="36px" height="36px" alt="phone Pin" class="mr-4" /> --}}
            @svg('images/phone', ['mr-4 w-9 h-9 fill-main-brand'])
            <a href="tel:{!! $phoneNumber !!}" class="paragraph-text-medium link-on-hover">{!! $phoneNumber !!}</a>
        </p>
        @endif
    </div>

    <div class="border-top sidebar-contact">
        <div class="border-top pb-5">{!! do_shortcode($section['forminator_shortcode']) !!}></div>
    </div>
</section>
<div class="
main-footer-business-info
{{-- Flex --}}
flex
flex-col
justify-between

{{-- Width --}}
w-full 

{{-- Extras --}}
text-center
md:text-center

mb-6
md:mb-0


">

    <div>
        @if (isset($footerLogo) && !empty($footerLogo))
        <p class="mb-4">
            <a class="brand " href="{{ home_url('/') }}">
                {!! $footerLogo !!}
            </a>
        </p>
        @endif

        @if (!empty($address))
        <p class="paragraph-text-small break-spaces mt-2">{!! $address !!}</p>
        @endif

        @if (!empty($phoneNumber))
        <p class="paragraph-text-small  mt-2">
            {!! !my_wp_is_mobile() ? '<a class="link-on-hover" href="tel:'. $phoneNumber .'">' : '' !!}
                {!! $phoneNumber !!}
                {!! !my_wp_is_mobile() ? '</a>': '' !!}
        </p>
        @endif

        @if (!empty($email))
        <p class="paragraph-text-small  mt-2">
            {!! !my_wp_is_mobile() ? '<a class="link-on-hover" href="mailto:'. $email .'">' : '' !!}
                {!! $email !!}
                {!! !my_wp_is_mobile() ? '</a>': '' !!}
        </p>
        @endif
    </div>
    @if(!empty($footerCTA))
    <div class="entry-content mt-8 md:mt-16 mb-8 md:mb-0">
        {!! $footerCTA !!}
    </div>
    @endif
</div>
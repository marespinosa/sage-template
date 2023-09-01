<form method="GET" class="search-form mx-auto w-full lg:w-5/12 flex align-items-end justify-content-between forminator-ui forminator-custom-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <input type="text" class="search-form-input forminator-input" name="s" placeholder="SEARCH" value="{!! $s !!}" />
    <button class="search-form-button flex items-center justify-center shrink-0 transition-3s" type="submit"><img src="@asset('images/search.png')" class="search-form-submit  " id="search-form-submit" alt="Search Icon" width="28" height="28" /></button>
</form>
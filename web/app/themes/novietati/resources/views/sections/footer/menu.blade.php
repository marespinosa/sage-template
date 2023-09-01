@if(!empty($footerMenu))
<div class="main-footer-menu w-full lg:flex justify-center">


    @foreach ($footerMenu as $menu)
    <nav class="main-footer-menu-item flex flex-col items-start p-7">
        @if (isset($menu['only_title'][0]) && $menu['only_title'][0] =='yes')
        <p class="menu-item title mb-3">{!! $menu['menu_only_title'] !!}</p>
        @else
        <a {!! !empty($menu['menu_title']['url']) ? 'href="' . $menu['menu_title']['url'] . '"' : '' !!}
            class="menu-item title mb-3 py-1 sm:py-0 {!! !empty($menu['menu_title']['url']) ? 'link-on-hover' : '' !!}">{!!
            $menu['menu_title']['title'] !!}</a>
        @endif
        @if(!empty($menu['loop']))
        @foreach ($menu['loop'] as $item)
        <a {!! !empty($item['link']['url']) ? 'href="' . $item['link']['url'] . '"' : '' !!}
            class="menu-item mb-1  py-1 sm:py-0 {!! !empty($item['link']['url']) ? 'link-on-hover' : '' !!}">{!!
            $item['link']['title'] !!}</a>
        @endforeach
        @endif
    </nav>
    @endforeach
</div>
@endif
{{-- Menu Icon - Mobile --}}
<div id="mobile-menu-icon" class="mobile-menu-icon block lg:hidden cursor-pointer">
    @svg('images.menu-hamburguer', ['w-8 h-8 color-mainBrand '])
</div>
@if (has_nav_menu('primary_navigation'))
{!!
wp_nav_menu([
'container' => '',
'theme_location' => 'primary_navigation',
'menu_class' => 'hidden lg:flex primary-navigation',
'fallback_cb' => false,
// 'items_wrap' => '<ul id="%1$s" style="display: flex" class="%2$s">%3$s</ul>',
])
!!}
@endif
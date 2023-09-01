@if (!empty($categories))
<div class="entry-categories flex @if(is_singular('post')) justify-center uppercase tracking-wide @endif">
    @foreach ($categories as $key => $cat)
    @if ($key != 0)
    <div class="list-separator mx-2"></div>
    @endif
    <a href="{!! get_category_link( $cat ) !!}" class="category-loop-item link-on-hover">{!! get_cat_name( $cat ) !!}</a>
    @endforeach
</div>
@endif
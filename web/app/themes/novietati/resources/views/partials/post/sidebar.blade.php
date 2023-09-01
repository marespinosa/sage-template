@if (!empty($tableContentSidebar))
<aside class=" hidden lg:block post-sidebar table-of-content sticky flex-shrink-0 mr-9 text-sm">
    <p class="uppercase mb-4">Table of Contents</p>

    @foreach ($tableContentSidebar as $key => $value)
    <p data-goto="{!!  $value['sanitize'] !!}"
        class="mb-2 table-of-content-item opacity-80 select-none cursor-pointer {!!  $value['sanitize'] !!} {!! $value['class'] !!}">
        {!! $value['text']
        !!}</p>
    @endforeach
</aside>
@endif
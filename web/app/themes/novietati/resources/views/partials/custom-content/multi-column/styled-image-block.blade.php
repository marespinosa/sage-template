@php
    $images_upload = $col['image']['url'];
@endphp

<div class="entry-content animate hide style-image-block">
    <figure class="">
        <img src="{{ $images_upload }}" />
    </figure>
    {!! $col['content'] !!}
</div> 
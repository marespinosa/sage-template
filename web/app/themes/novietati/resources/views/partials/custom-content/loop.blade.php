@php
$custom_content = get_field('custom_content', get_true_post_id());
@endphp

@if (isset($custom_content) && !empty($custom_content))
@foreach ($custom_content as $key => $section)
@include('partials.custom-content.' . str_replace('_','-',$section['acf_fc_layout']), ['key' => $key])
@endforeach
@endif
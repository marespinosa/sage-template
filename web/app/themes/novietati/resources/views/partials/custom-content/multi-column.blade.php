<?php 

$grid = 'grid';
//Check If has Image and then Reverse on mobile
if(isset($section['content'][1]['acf_fc_layout']) && $section['content'][1]['acf_fc_layout'] == 'image'){
    $grid = 'flex-col-reverse sm:flex-row flex sm:grid ';
}

$gap = $section['gap'];

if(wp_is_mobile()){
    if($gap > 70){
        $gap = $gap/2;
    }
}


$round_image = isset($section['round_image']) ? $section['round_image'] : ''; 
$image = isset($section['image']) ? $section['image'] : ''; 

if (is_array($round_image)) {
    $round_image = 'Image' . implode('', $round_image);
} elseif (empty($round_image)) {
    $round_image = 'DefaultImageURL';
}

?>

<section id="section-{!! $key !!}"
    class="acf-fc-layout acf-fc-layout-multi-column section-page @if(!empty($section['background_parallax'])) bg-fixed @endif @if(!empty( $section['type_of_background'] ) && isset($section['background'][0])  ) section-background-{!! $section['type_of_background'] !!} py-20 @endif text-center ">
    <div class="{!! $section['container'][0] ?? false !!}">

        {{-- Heading --}}
        @if (!empty($section['heading']))
        <div class="entry-content mb-14">
            {!! $section['heading'] !!}
        </div>
        @endif

        {{-- Content --}}
        <div style="gap: {!! $gap !!}px"
            class="{!! $grid !!} {!! $section['alignment'] !!}  lg:grid-cols-{!! $section['number_of_columns'] !!} <?php echo esc_attr($round_image); ?> ">
            @if (!empty($section['content']))
            @foreach ($section['content'] as $col)
            @include('partials.custom-content.multi-column.' . str_replace('_','-', $col['acf_fc_layout']))
            @endforeach
            @endif
        </div>

        {{-- Footer --}}
        @if (!empty($section['footer']))
        <div class="entry-content mt-8">
            {!! $section['footer'] !!}
        </div>
        @endif
    </div>
</section>

{{-- CUSTOM COLOR --}}
@if(isset($section['background'][0]) && !empty( $section['type_of_background'] ) && $section['type_of_background'] ==
'custom')
<?php 

$id = '#section-' . $key;

echo '<style>';

echo $id .'{';
echo 'background-color: ' . $section['custom_color'] .';';
echo '}';

echo $id .','. $id.' h1,'. $id.' h2,'. $id.' h3,'. $id.' h4,'. $id.' h5,'. $id.' h6,'. $id.' li:before {';
echo 'color: ' . $section['custom_color_text'] .';';
echo '}';

echo '</style>';
?>
@endif

{{-- Background --}}
@if(isset($section['background'][0]) && !empty( $section['type_of_background'] ) && $section['type_of_background'] ==
'image')
<?php 

$id = '#section-' . $key;

echo '<style>';

echo $id .'{';
echo 'background-image: url(' . wp_get_attachment_image_url($section['background_image'], 'massive') .');';
echo 'background-position: center;';
echo 'background-size: cover;';
echo 'background-repeat: no-repeat;';
echo '}';
echo '</style>';

?>
@endif
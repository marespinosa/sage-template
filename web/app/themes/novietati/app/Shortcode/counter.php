<?php

//Counter
function counter_callback( $atts = array(), $content = null ) {
	$a = shortcode_atts( array(
		'value' => '0',
		'unit' => '',
    ), $atts );

	return '<p class="paragraph-text-large text-center"><span class="counter-js " data-counter-time="2000" data-counter-delay="0" counterupto="'.$a['value'].'" data-counterupto="'.$a['value'].'">0</span><span>'.$a['unit'].'</span> </p>';
}
add_shortcode( 'counter', 'counter_callback' );
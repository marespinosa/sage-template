<?php
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2', 9999);

// That will add the new drop down to the editor. Then you create your custom styles Callback function to filter the MCE settings
function my_mce_before_init_insert_formats($init_array)
{
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button',
        ),
        array(
            'title' => 'Button (Outline)',
            'selector' => 'a',
            'classes' => 'button-outline',
        ),
        array(
            'title' => 'Button Secondary',
            'selector' => 'a',
            'classes' => 'button-secondary',
        ),
        array(
            'title' => 'Button Secondary (Outline)',
            'selector' => 'a',
            'classes' => 'button-secondary-outline',
        ),
        array(
            'title' => 'Link (High Contrast)',
            'selector' => 'a',
            'classes' => 'link',
        ),
        array(
            'title' => 'Link (Low Contrast)',
            'selector' => 'a',
            'classes' => 'link-low-contrast',
        ),
        array(
            'title' => 'Text Large',
            'selector' => 'p, a',
            'classes' => 'paragraph-text-large',
        ),
        array(
            'title' => 'Text Medium',
            'selector' => 'p, a',
            'classes' => 'paragraph-text-medium',
        ),
        array(
            'title' => 'Text Small',
            'selector' => 'p, a',
            'classes' => 'paragraph-text-small',
        ),
    );
    $init_array['style_formats'] = json_encode($style_formats);
    $init_array['preview_styles'] = 'font-family';

    return $init_array;
    

}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
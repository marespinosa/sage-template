<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Website Options Settings',
        'menu_title' => 'Website Options',
        'menu_slug' => 'website-options',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'data:image/svg+xml;base64,' . base64_encode(include ('assets/logo.php')),
        'position' => '70',
    ));

}
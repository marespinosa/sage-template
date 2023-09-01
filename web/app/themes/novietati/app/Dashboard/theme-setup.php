<?php
//Auto Create Pages after setup Theme
add_action('after_setup_theme', 'mytheme_setup');
function mytheme_setup()
{

    if (get_option('page_on_front') == '0' && get_option('show_on_front') == 'posts') {

        update_option('show_on_front', 'page');

        // Create homepage
        $page = array(
            'post_type' => 'page',
            'post_title' => 'Home',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
        );

        $page_id = wp_insert_post($page);
        update_option('page_on_front', $page_id);

        // Create Blog
        $page = array(
            'post_type' => 'page',
            'post_title' => 'Blog',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
        );

        $page_id = wp_insert_post($page);
        update_option('page_for_posts', $page_id);

        // Create Contact
        $page = array(
            'post_type' => 'page',
            'post_title' => 'Contact',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
        );

        $page_id = wp_insert_post($page);
        update_post_meta($page_id, '_wp_page_template', 'views/template-contact.blade.php');

        // Create About
        $page = array(
            'post_type' => 'page',
            'post_title' => 'About',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
        );

        $page_id = wp_insert_post($page);
        update_post_meta($page_id, '_wp_page_template', 'views/template-about.blade.php');

        //Delete Pages
        // $pages = array('privacy-policy', 'sample-page');

        // foreach ($pages as $slug) {
        //     $page = get_page_by_path($slug);

        //     if ($page) {
        //         wp_delete_post($page->ID, true);
        //     }
        // }
    }

}
<?php

//Manage Fonts
function load_fonts()
{
    // echo '<link rel="stylesheet" href="https://use.typekit.net/psb6mgy.css">' .  "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;700&display=swap" rel="preload" as="style">' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;900&display=swap" rel="preload" as="style">' . "\n";
}
add_action('wp_head', 'load_fonts', 1);

//Classic Editor
add_filter('use_block_editor_for_post', '__return_false', 10);

//Exceprt to Pages
add_post_type_support('page', 'excerpt');

// Custom media sizes
function wpdocs_theme_setup()
{
    add_image_size('massive', 1920, null, false);
}
add_action('after_setup_theme', 'wpdocs_theme_setup');

//Image P tag remover and add Embed div to IFrames
function filter_ptags_on_images($content)
{
    $content = preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
    $content = preg_replace('/<p>\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', ' <div class="embed-container">\1</div>', $content);
    $content = str_replace('<p>&nbsp;</p>', '<p class="empty">&nbsp;</p>', $content);
    return $content;
}
add_filter('the_content', 'filter_ptags_on_images');
// add_filter('acf_the_content', 'setup_the_content');

//Disable comments
require 'disable-comments.php';

//Allow SVG
function my_custom_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';

    // Optional. Remove a mime type.
    unset($mimes['exe']);

    return $mimes;
}
add_filter('upload_mimes', 'my_custom_mime_types');

//Editor to blog page
if (!function_exists('fix_no_editor_on_posts_page')) {

    /**
     * Add the wp-editor back into WordPress after it was removed in 4.2.2.
     *
     * @param Object $post
     * @return void
     */
    function fix_no_editor_on_posts_page($post)
    {
        if (isset($post) && $post->ID != get_option('page_for_posts')) {
            return;
        }

        remove_action('edit_form_after_title', '_wp_posts_page_notice');
        add_post_type_support('page', 'editor');
    }
    add_action('edit_form_after_title', 'fix_no_editor_on_posts_page', 0);
}

//Add Lightbox to gallery
add_filter('wp_get_attachment_link', 'rc_add_rel_attribute', 10, 2);
function rc_add_rel_attribute($link, $id)
{
    $attachment_metadata = wp_get_attachment_metadata($id);

    return str_replace('<a href', '<a data-toggle="lightbox" data-height="' . $attachment_metadata['height'] . '" data-width="' . $attachment_metadata['width'] . '" data-gallery="gallery" href', $link);

    echo "here $id";
    print_r($attachment_metadata['width']);
    return $link;
}

//Disable Login Language Selector
add_filter('login_display_language_dropdown', '__return_false');

//Disable Widgets
function disable_all_widgets($sidebars_widgets)
{
    if (is_home()) {
        $sidebars_widgets = array(false);
    }

    return $sidebars_widgets;
}

function remove_site_health_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}
add_action('sidebars_widgets', 'disable_all_widgets');
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');

//Disable Items on Menu
add_action('admin_menu', 'wpdocs_remove_menus');
function wpdocs_remove_menus()
{
    global $submenu;

    if (wp_get_current_user()->ID != 1) {
        remove_menu_page('tools.php'); //Tools
        remove_menu_page('plugins.php'); //Plugins
        remove_menu_page('themes.php'); //Appearance
        remove_menu_page('options-general.php'); //Tools
        remove_menu_page('edit.php?post_type=acf-field-group'); //Custom Fields
        remove_submenu_page('index.php', 'update-core.php'); //Updates
    }

    unset($submenu['themes.php'][5]); //Themes
    unset($submenu['themes.php'][7]); //Widgets
}

//Focal point to inline code - Plugin WP SmartCrop
function get_object_position_by_focal_point($attachment_id)
{
    $style = 'center';
    $focus = get_post_meta($attachment_id, '_wpsmartcrop_image_focus', true);
    if ($focus && is_array($focus) && isset($focus['left']) && isset($focus['top'])) {
        $left = $focus['left'];
        $top = $focus['top'];
        $style = "$left% $top%";
    }

    return $style;
}

//Create img Markup using focal point
function get_image_with_focus_on($attachment_id, $class = '', $size = 'massive')
{
    $style = get_object_position_by_focal_point($attachment_id);

    $object_cover = empty($class) || strpos($class, 'object-') === false ? 'object-cover' : '';

    if (strpos($class, 'object-left') || strpos($class, 'object-right')) {
        $style = '';
    }

    return wp_get_attachment_image($attachment_id, $size, false, array("class" => "focused-image $object_cover  $class", "style" => "object-position: $style; "));
}

// Remove Boxes in WordPress Dashboard
function remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['dashboard']['normal']['core'] = array();
    $wp_meta_boxes['dashboard']['side']['core'] = array();
}
add_action('wp_dashboard_setup', 'remove_all_dashboard_meta_boxes');
remove_action('welcome_panel', 'wp_welcome_panel');

//Add CSS to the Admin Dashboard
function load_custom_wp_admin_style($hook)
{
    wp_enqueue_style('custom_wp_admin_css', get_template_directory_uri() . '/app/Dashboard/assets/admin.css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

//Automatically Set the WordPress Image Title, Alt-Text & Other Meta
add_action('add_attachment', 'my_set_image_meta_upon_image_upload');
function my_set_image_meta_upon_image_upload($post_ID)
{

    // Check if uploaded file is an image, else do nothing

    if (wp_attachment_is_image($post_ID)) {

        $my_image_title = get_post($post_ID)->post_title;

        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $my_image_title = preg_replace('%\s*[-_\s]+\s*%', ' ', $my_image_title);

        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $my_image_title = ucwords(strtolower($my_image_title));

        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        // $my_image_meta = array(
        //     'ID'        => $post_ID,            // Specify the image (ID) to be updated
        //     'post_title'    => $my_image_title,        // Set image Title to sanitized title
        //     'post_excerpt'    => $my_image_title,        // Set image Caption (Excerpt) to sanitized title
        //     'post_content'    => $my_image_title,        // Set image Description (Content) to sanitized title
        // );

        // Set the image Alt-Text
        update_post_meta($post_ID, '_wp_attachment_image_alt', $my_image_title);

        // Set the image meta (e.g. Title, Excerpt, Content)
        // wp_update_post( $my_image_meta );

    }
}

//Add The Content Filter Format to ACF Content(EDITOR)
add_filter('acf/format_value/type=wysiwyg', 'format_value_wysiwyg', 10, 3);
function format_value_wysiwyg($value, $post_id, $field)
{
    $value = apply_filters('the_content', $value);
    return $value;
}

//Image and Gallery just media type = file
function wpb_imagelink_setup()
{

    update_option('image_default_link_type', 'file');
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

add_filter('shortcode_atts_gallery',
    function ($out) {
        $out['link'] = 'file';
        return $out;
    }
);

// Preload Big/main Images
function preload_post_thumbnail()
{
    $page_header = get_field('page_header_settings_background');
    if (isset($page_header['desktop']) && !empty($page_header['desktop'])) {
        $src = wp_get_attachment_image_url($page_header['desktop'], 'massive', false);
        echo '<link rel="preload" as="image" href="' . $src . '" />' . "\n";
        $src = wp_get_attachment_image_url($page_header['desktop'], 'large', false);
        echo '<link rel="preload" as="image" href="' . $src . '" />' . "\n";
        $src = wp_get_attachment_image_url($page_header['desktop'], 'medium', false);
        echo '<link rel="preload" as="image" href="' . $src . '" />' . "\n";
        $src = wp_get_attachment_image_url($page_header['desktop'], 'thumbnail', false);
        echo '<link rel="preload" as="image" href="' . $src . '" />' . "\n";
    }
}
add_action('wp_head', 'preload_post_thumbnail');

//Get Current Post ID True
function get_true_post_id()
{
    if (is_front_page()) {
        return get_option('page_on_front');
    }

    if (is_home()) {
        return get_option('page_for_posts');
    }

    if (is_404()) {
        return get_field('linking_404_page', 'option');
    }

    return get_the_ID();
}

//GEt currrent Cat id
function get_current_cat_ID()
{
    $category = get_queried_object();
    return $category->term_id;
}

//Create FAQ structured data
function create_faq_schema($list)
{
    echo '<script type="application/ld+json">';
    echo '{';
    echo '"@context": "https://schema.org",';
    echo '"@type": "FAQPage",';

    echo '"mainEntity": [';

    foreach ($list as $key => $value) {

        if ($key != 0) {
            echo ',';
        }

        $answer = str_replace('"', "'", $value['answer']);

        echo '{';
        echo '"@type": "Question",';
        echo '"name": "' . $value['question'] . '",';
        echo '"acceptedAnswer": {';
        echo '"@type": "Answer",';
        echo '"text": "' . $answer . '"';
        echo '}';

        if (!empty($value['image'])) {
            echo ',';

            $img_a_id = '/#image-' . $value['image']['ID'];
            $img_a_url = $value['image']['url'];
            $img_a_width = $value['image']['width'];
            $img_a_height = $value['image']['height'];

            if (isset($value['image']['sizes']['medium'])) {
                $img_a_url = $value['image']['sizes']['medium'];
                $img_a_width = $value['image']['sizes']['medium-width'];
                $img_a_height = $value['image']['sizes']['medium-height'];
            }

            echo '"image": {';
            echo '"@type": "ImageObject",';
            echo '"@id": "' . $img_a_id . '",';
            echo '"url": "' . $img_a_url . '",';
            echo '"height": "' . $img_a_width . '",';
            echo '"width": "' . $img_a_height . '"';
            echo '}';
        }

        if (!empty($value['url'])) {
            echo ',';
            echo '"url": "' . $value['url']['url'] . '"';
        }

        echo '}';
    }

    echo ']';

    echo '}';
    echo '</script>';
}

// How to search only in post title - wp_query
function title_filter($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('search_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $search_term . '%\'';
    }
    return $where;
}

//Adding WooCommerce Support
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

/**
 * Check if WooCommerce is activated
 */
if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated()
    {
        if (class_exists('woocommerce')) {return true;} else {return false;}
    }
}

/*
 * SMTP  Mandrill Settings
 */
$settings_mandrill = get_field('email_settings_mandrill', 'option');
function mandrill_send_email($phpmailer)
{
    $settings_mandrill = get_field('email_settings_mandrill', 'option');
    $settings_mandrill_api_key = $settings_mandrill['api_key'];

    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mandrillapp.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = '587';
    $phpmailer->Username = 'Legend';
    $phpmailer->Password = $settings_mandrill_api_key;
    $phpmailer->SMTPSecure = 'tsl';

    // Additional settings…
    $sender_name = !empty($settings_mandrill['sender_name']) ? $settings_mandrill['sender_name'] : false;
    $sender_email_address = !empty($settings_mandrill['sender_email_address']) ? $settings_mandrill['sender_email_address'] : false;

    if ($sender_name && !empty($sender_name)) {
        $phpmailer->FromName = $sender_name;
    }

    if ($sender_email_address && !empty($sender_email_address)) {
        $phpmailer->From = $sender_email_address;
    }
}
if ($settings_mandrill && isset($settings_mandrill['api_key']) && !empty($settings_mandrill['api_key'])) {
    add_action('phpmailer_init', 'mandrill_send_email');
}

/*
 * Transform the social media url to a Icon Link to the email
 */

function get_social_media_img($url)
{

    $social_medias = [
        'instagram',
        'facebook',
        'youtube',
        'twitter',
        'linkedin',
        'vimeo',
        'pinterest',
    ];

    foreach ($social_medias as $key => $value) {
        $pos = strpos($url, $value);

        if ($pos) {
            return $value;
        }
    }

    return 'default';
}

//Excluding iPad from wp_is_mobile
function my_wp_is_mobile()
{
    static $is_mobile;

    if (isset($is_mobile)) {
        return $is_mobile;
    }

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

// Disable Image Attachment Pages
function redirect_attachment_page()
{
    if (is_attachment()) {
        global $post;
        if ($post && $post->post_parent) {
            wp_redirect(esc_url(get_permalink($post->post_parent)), 301);
            exit;
        } else {
            wp_redirect(esc_url(home_url('/')), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_attachment_page');

//The website Copyright
function get_website_copyright()
{

    $date = date("Y");
    $siteName = get_bloginfo('name', 'display');

    return "© $date $siteName";
}

// Limit Maximum Upload File Size
add_filter('upload_size_limit', function (): int {
    return 2097152; // 2 * 1024 * 1024 = 2MB.
}, 999);

// Remove Role Contributor
remove_role('contributor');

//Canonical Search page
function search_rel_canonical()
{
    if (is_search()) {
        echo '<link rel="canonical" href="' . get_home_url() . '/?s="> ' . "\n\r";
    }
}

add_action('wp_head', 'search_rel_canonical');


function customize_category_output($output, $args) {
    if ($args['show_count']) {
        $output = preg_replace('/<\/a> \((\d+)\)/', ' <span class="float-right pr-10 ">$1</span></a>', $output);
    }
    return $output;
}

add_action( 'woocommerce_before_shop_loop_item', 'remove_product_elements', 1 );
function remove_product_elements() {
    if( is_shop() ) {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    }
}

add_action( 'woocommerce_after_shop_loop_item', 'add_custom_read_more', 15 );
function add_custom_read_more() {
    if( is_shop() ) {
        global $product;
        echo '<a href="' . get_permalink( $product->get_id() ) . '" class="pb-8">Enquiry</a>';
    }
}


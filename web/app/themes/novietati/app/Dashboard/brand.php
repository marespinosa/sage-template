<?php

/**
 * Remove WordPress admin bar menu
 */
function remove_wp_logo($wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
}

/**
 * Replace login screen logo link
 */
function login_logo_url($url)
{
    return 'https://www.legendhasit.co.nz';
}

// Replace login logo title
function login_logo_title()
{
    return 'Built by Legend';
}

// Create custom admin bar m enu
function create_menu()
{
    global $wp_admin_bar;
    $menu_id = 'my-logo';
    $title = wp_remote_get(get_template_directory_uri() . "/app/Dashboard/assets/legend-logo.svg?v=1.0.1", array('sslverify' => false));

    $wp_admin_bar->add_node([
        'id' => $menu_id,
        'title' => '<span class="ab-icon">' . $title['body'] . '</span>',
        'href' => 'https://www.legendhasit.co.nz',
        'meta' => ['target' => '_blank', 'rel' => 'noopener'],
    ]);

}

/**
 * Replace login screen logo
 */
function menu_custom_logo()
{
    ?>
<style type="text/css">
    #wpadminbar #wp-admin-bar-my-logo>.ab-item .ab-icon {
        width: 80px;
        margin-right: 0 !important;
        padding-top: 2px !important;
        padding-left: 3px !important;
    }

    .wp-admin #wpadminbar #wp-admin-bar-my-logo>.ab-item .ab-icon {
        padding-top: 7px !important;
    }

    #wpadminbar #wp-admin-bar-my-logo>.ab-item .ab-icon svg * {
        fill: currentColor;
    }

    /* BAR COLOR */
    body.wp-admin #wpadminbar {
        background: #4d1254;
    }
</style>
<?php
}

/**
 * Add "designed and developed..." to admin footer.
 */
function admin_footer($content)
{
    return 'Website built by <a target="_blank" rel="noopener" href="https://www.legendhasit.co.nz">Legend</a>';
}

// add_action('login_enqueue_scripts', 'login_logo');
add_filter('admin_footer_text', 'admin_footer', 11);
add_action('admin_bar_menu', 'remove_wp_logo', 999);
// add_action('admin_bar_menu', 'create_menu', 1);
add_action('wp_before_admin_bar_render', 'menu_custom_logo');
add_filter('login_headerurl', 'login_logo_url');
add_filter('login_headertext', 'login_logo_title');
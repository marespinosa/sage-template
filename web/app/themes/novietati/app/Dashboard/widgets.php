<?php 

require 'widgets/quick-links.php';
require 'widgets/welcome.php';
// require 'widgets/qrcode.php';

/**
* Add a new dashboard widget.
*/
function wpdocs_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'dashboard_widget_quick_links', 'Quick Links', 'widget_quick_links' );
    wp_add_dashboard_widget( 'dashboard_widget_help_service', 'Legend Help Service', 'widget_help_service' );
    // wp_add_dashboard_widget( 'dashboard_widget_qrcode', 'Legend QRCode', 'widget_qrcode' );

}
add_action( 'wp_dashboard_setup', 'wpdocs_add_dashboard_widgets' );
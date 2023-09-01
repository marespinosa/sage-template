<?php

function widget_quick_links( $post, $callback_args ) {
?>
<div class="custom-widget-container">
    <ul>
        <li><span class="dashicons dashicons-list-view"></span> <a href="<?php echo admin_url( 'nav-menus.php' ); ?>">Manage menus</a></li>
    </ul>
</div>
<?php
}
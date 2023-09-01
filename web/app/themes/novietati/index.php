<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo('name', 'display'); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?php wp_head();?>
</head>

<body <?php body_class('wating-loading');?>>
    <?php wp_body_open();?>
    <?php do_action('get_header');?>

    <div id="app">
        <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer');?>
    <?php wp_footer();?>
</body>

</html>
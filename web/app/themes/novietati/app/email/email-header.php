<?php

$header_logo = get_field('header_logo', 'option');
$email_template_logo = get_image_with_focus_on($header_logo, 'main-branding object-contain mx-auto', 'large');

// Settings
$mainColor = '#4D1254';
$body_background = '#f1f5ff';
$body_text_color = '#5a5a5a';

?>
<table style="width: 100%; background-color: <?php echo $body_background ?>; border-collapse: collapse; ">
    <tbody>
    <tr>
        <td style="padding: 0;">
            <table
                style="width: 600px; margin: 0 auto; background-color: #FFF; border-collapse: collapse; border-top: 5px solid <?php echo $mainColor ?>">
                <tr>
                    <td style="text-align: center; padding-top: 30px; padding-bottom: 40px;">
                        <a href="<?php echo home_url('/') ?>">
                            <?php echo $email_template_logo ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
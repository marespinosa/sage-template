<?php
$key_url = get_bloginfo('wpurl') . '/wp-login.php?action=rp&key=' . $key . '&login=' . $user_data->data->user_login;
?>
    <tr>
        <td style="padding: 0;">
            <table style="width: 600px; margin: 0 auto; background-color: #FFF; border-collapse: collapse; ">
                <tr>
                    <td
                        style="text-align: center;font-family: Roboto,sans-serif;font-size: 29px;line-height: 39px;color: <?php echo $body_text_color; ?>;font-weight: 600; ">
                        <span style="display: inline-block; max-width: 400px;">
                            Password Reset
                        </span>
                    </td>
                </tr>
                <tr>
                    <td
                        style="text-align: center;font-family: Roboto,sans-serif;font-size: 16px;line-height: 23px;color: <?php echo $body_text_color; ?>; padding-top: 20px;">
                        <span style="display: inline-block; max-width: 500px;">
                            Someone recently requested that the password be reset for<br />
                            <strong><?php echo $user_data->data->user_login ?>.</strong><br /><br />
                            To reset your password please click this button:
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 20px; padding-bottom: 40px;">
                        <a href="<?php echo $key_url; ?>"
                            style="display: inline-block;text-align: center;font-family: Roboto,sans-serif;font-size: 16px;color: #FFF;background-color: <?php echo $mainColor; ?>;padding: 12px 20px;font-weight: bold;text-decoration: none;border-radius: 8px;">Reset
                            my password</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 20px; background-color: #f1f1f1; font-size: 11px; color: #000; font-family: Roboto,sans-serif;">
                        <strong>Trouble clicking?</strong> Copy and paste this URL into your browser:<br />
                        <a style="color:     text-decoration: underline;                            color: #2585b2;"
                            href="<?php echo $key_url; ?>"><?php echo $key_url; ?></a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
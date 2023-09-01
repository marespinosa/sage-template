<?php

function sanitize_output($buffer)
{

    $search = array(
        '/\>[^\S ]+/s', // strip whitespaces after tags, except space
        '/[^\S ]+\</s', // strip whitespaces before tags, except space
        '/(\s)+/s', // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/', // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        '',
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

//
function xxx_wp_email_content_type()
{
    if ($GLOBALS["use_html_content_type"]) {
        return 'text/html';
    } else {
        return 'text/plain';
    }
}

/*
 * Reset Password Notification
 */
add_filter("retrieve_password_message", "legend_custom_email_template_reset_password", 99, 4);
function legend_custom_email_template_reset_password($message, $key, $user_login, $user_data)
{
    add_filter('wp_mail_content_type', 'xxx_wp_email_content_type');

    ob_start();

    $GLOBALS["use_html_content_type"] = true;

    include 'email/email-header.php';

    include 'email/email-reset_password.php';

    include 'email/email-footer.php';

    $message = ob_get_contents();
    ob_end_clean();

    return $message;
}

/*
 * Reset Password Notification
 */
add_filter('wp_new_user_notification_email', 'legend_custom_email_template_new_user_notification', 10, 3);
function legend_custom_email_template_new_user_notification($wp_new_user_notification_email, $user, $blogname)
{
    add_filter('wp_mail_content_type', 'xxx_wp_email_content_type');
    $key = get_password_reset_key($user);
    $user_login = stripslashes($user->user_login);
    $user_email = stripslashes($user->user_email);

    ob_start();

    $GLOBALS["use_html_content_type"] = true;

    include 'email/email-header.php';

    include 'email/email-new_user.php';

    include 'email/email-footer.php';

    $message = ob_get_contents();
    ob_end_clean();

    $wp_new_user_notification_email['subject'] = __('[%s] Login Details');
    $wp_new_user_notification_email['message'] = $message;

    return $wp_new_user_notification_email;
}

/*
 * Forminator
 */

function custom_forminator_custom_form_mail_before_send_mail($message, $custom_form, $data, $entry, $instance)
{

    ob_start();

    include 'email/email-header.php';

    include 'email/email-forminator.php';

    include 'email/email-footer.php';

    $message = ob_get_contents();
    ob_end_clean();

    return sanitize_output($message);
}

//add the action
add_filter('forminator_custom_form_mail_admin_message', 'custom_forminator_custom_form_mail_before_send_mail', 10, 5);

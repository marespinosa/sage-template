<?php

$email_template = get_field('email_settings_template', 'option');
$email_template_links = $email_template['links'];
$email_template_message = $email_template['message'];
$email_template_copyright = get_website_copyright();
$email_template_social_medias = get_field('general_social_media', 'option');
$email_template_phone_cta = get_field('general_business_phone_number', 'option');

?>
<tr>
    <td style=" padding: 0; ">
        <table style="width: 600px; background-color: #16191E; border-collapse: collapse; margin: 0 auto;">
            <tr>
                <td style="text-align: center; padding-top: 40px; padding-bottom: 10px;">
                    <a href="<?php echo home_url('/') ?>">
                        <img src="<?php echo \Roots\asset('images/email-template-footer.png') ?>" alt="Logo Footer" width="125"
                            style="margin: 0 auto" /></a>
                </td>
            </tr>
            <!-- {{-- Links --}} -->
            <?php if (!empty($email_template_links)) {?>
            <tr>
                <td
                    style="color: #8b8c8f; font-size: 12px; font-weight: bold; line-height: 18px; text-align: center; font-family: Roboto,sans-serif;  padding-bottom: 15px;">
                    <?php foreach ($email_template_links as $key => $item) {?>
                        <span>

                        <?php if ($key != 0) {echo ' | ';}?>


                    <a style="color: #8b8c8f; text-decoration: none !important;"
                        href="<?php echo $item['link']['url']; ?>">
                        <?php echo $item['link']['title']; ?></a>
                    </span>
                    <?php }?>
                </td>
            </tr>
            <?php }?>


    



            <!-- {{-- Message --}} -->
            <?php if (!empty($email_template_message)) {?>
            <tr>
                <td
                    style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif;  padding-bottom: 10px;">
                    <span style="display: inline-block; max-width: 380px;">
                        <?php echo $email_template_message; ?>
                    </span>
                </td>
            </tr>
            <?php }?>
            <!-- {{-- CTA Phone --}} -->
            <?php if (!empty($email_template_phone_cta)) {?>
            <tr>
                <td
                    style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif; padding-bottom: 20px;">
                    Call us on <a style="color: #8b8c8f; text-decoration: none !important;" href="tel:<?php echo $email_template_phone_cta; ?>"><?php echo $email_template_phone_cta; ?></a>
                </td>
            </tr>
            <?php }?>

            <!-- {{-- Copyright --}} -->
            <?php if (!empty($email_template_copyright)) {?>
            <tr>
                <td
                    style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif; padding-bottom: 40px;">
                    <?php echo $email_template_copyright; ?>
                </td>
            </tr>
            <?php }?>
        </table>
    </td>
</tr>
<tbody>
</table>

{{--
Template Name: Preview Email
--}}
<?php 

$settings = get_field('website_setup', 'option');

$email_template = $settings['email_template'];
$email_template_logo = get_image_with_focus_on($settings['header_logo'], 'main-branding object-contain mx-auto', 'large');
$email_template_links = $email_template['links'];
$email_template_message = $email_template['message'];
$email_template_copyright = $email_template['copyright'];
$email_template_social_medias = $email_template['social_media'];
$email_template_phone_cta = $email_template['phone_cta'];


// Settings
$mainColor = '#4D1254';
$body_background= '#f1f5ff';
$body_text_color = '#5a5a5a';


?>

<div class="min-h-screen" style="background-color: <?php echo $body_background ?>; padding-top: 60px">
    <table style="width: 100%; background-color: <?php echo $body_background ?>; border-collapse: collapse; ">
        <tr>
            <td>
                {{-- Header --}}
                <table
                    style="width: 600px; margin: 0 auto; background-color: #FFF; border-collapse: collapse; border-top: 5px solid {!! $mainColor !!}">
                    <tr>
                        <td style="text-align: center; padding-top: 30px; padding-bottom: 40px;">
                            <a href="<?php echo home_url('/') ?>">
                                <?php echo $email_template_logo ?>
                            </a>
                        </td>
                    </tr>
                </table>
                {{-- BOdy --}}
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
                                <strong>pedro1694.</strong><br /><br />
                                To reset your password please click this button:
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding-top: 20px; padding-bottom: 40px;">
                            <a href=""
                                style="display: inline-block;text-align: center;font-family: Roboto,sans-serif;font-size: 16px;color: #FFF;background-color: <?php echo $mainColor; ?>;padding: 12px 20px;font-weight: bold;text-decoration: none;border-radius: 8px;">Reset
                                my password</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding: 20px; background-color: #f1f1f1; font-size: 11px">
                            <strong>Trouble clicking?</strong> Copy and paste this URL into your browser:<br />
                            <a style="color:     text-decoration: underline;                            color: #2585b2;"
                                href="">https://wordpress.com/wp-login.php?action=rp&key=HWZ5dox1N7rZyqDbXPoJ&login=pedro1694</a>
                        </td>
                    </tr>
                </table>
                {{-- BOdy End --}}
            </td>
        </tr>
        <tr>
            <td style=" padding: 0; ">
                <table style="width: 600px; background-color: #16191E; border-collapse: collapse; margin: 0 auto;">
                    <tr>
                        <td style="text-align: center; padding-top: 40px; padding-bottom: 10px;">
                            <a href="{{ home_url('/') }}">
                                <img src="@asset('images/email-template-footer.png')" alt="Logo Footer" width="125"
                                    style="margin: 0 auto" /></a>
                        </td>
                    </tr>
                    {{-- Links --}}
                    @if (!empty($email_template_links))
                    <tr>
                        <td
                            style="color: #8b8c8f; font-size: 12px; font-weight: bold; line-height: 18px; text-align: center; font-family: Roboto,sans-serif;  padding-bottom: 15px;">
                            @foreach ($email_template_links as $key => $item)

                            @if($key != 0)
                            |
                            @endif

                            <a style="color: #8b8c8f; text-decoration: none !important;"
                                href="{!! $item['link']['url'] !!}">{!!
                                $item['link']['title'] !!}</a>

                            @endforeach
                        </td>
                    </tr>
                    @endif
                    {{-- Social Medias --}}
                    @if (!empty($email_template_social_medias))
                    <tr>
                        <td align="center" style="padding-bottom: 15px;">
                            <table>
                                <tr>
                                    @foreach ($email_template_social_medias as $item)
                                    @php($img_src = get_social_media_img($item['item']))
                                    <td style="padding: 0 3px">
                                        <a href="{!! $item['item'] !!}">
                                            <img src="@asset('images/email/'.$img_src.'.png')" width="24" height="24" />
                                        </a>
                                    </td>
                                    @endforeach
                                </tr>
                            </table>
                    </tr>
            </td>
            @endif
            {{-- Message --}}
            @if (!empty($email_template_message))
        <tr>
            <td
                style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif;  padding-bottom: 10px;">
                <span style="display: inline-block; max-width: 380px;">
                    {!! $email_template_message !!}
                </span>
            </td>
        </tr>
        @endif
        {{-- CTA Phone --}}
        @if (!empty($email_template_phone_cta))
        <tr>
            <td
                style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif; padding-bottom: 20px;">
                Call us on <a href="tel:{!! $email_template_phone_cta !!}">{!! $email_template_phone_cta !!}</a>
            </td>
        </tr>
        @endif
        {{-- Copyright --}}
        @if (!empty($email_template_copyright))
        <tr>
            <td
                style="color: #8b8c8f; font-size: 12px; line-height: 18px; text-align: center; font-family: Roboto,sans-serif; padding-bottom: 40px;">
                {!! $email_template_copyright !!}
            </td>
        </tr>
        @endif
    </table>

    </td>
    </tr>
    </table>
</div>
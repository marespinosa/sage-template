<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    protected static $views = [
        'sections.header',
        'sections.footer',
        'partials.custom-content.contact-form',
    ];

    public function with()
    {

        return [
            //General
            'siteName' => $this->siteName(),
            'email' => $this->email(),
            'phoneNumber' => $this->phoneNumber(),
            'address' => $this->address(),
            'socialMedia' => $this->socialMedia(),

            //Header
            'headerLogo' => $this->headerLogo(),
            'primaryMenu' => $this->primaryMenu(),
            'headerCTA' => $this->headerCTA(),

            //Footer
            'footerLogo' => $this->footerLogo(),
            'footerMenu' => $this->footerMenu(),
            'footerCTA' => $this->footerCTA(),
            'copyright' => $this->copyright(),

        ];
    }

    //General
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
    public function email()
    {
        return get_field('general_business_email', 'option');
    }
    public function phoneNumber()
    {
        return get_field('general_business_phone_number', 'option');
    }
    public function address()
    {
        return get_field('general_business_address', 'option');
    }

    public function socialMedia()
    {
        return get_field('general_social_media', 'option');
    }

    //Header
    public function headerLogo()
    {
        $logo = get_field('header_logo', 'option');

        return get_image_with_focus_on($logo, 'main-branding object-contain', 'large');
    }

    public function primaryMenu()
    {

        if (!has_nav_menu('primary_navigation')) {
            return false;
        }

        return wp_nav_menu([
            'container' => '',
            'theme_location' => 'primary_navigation',
            'menu_class' => 'primary-navigation ',
            'fallback_cb' => false,
            'echo' => false,
        ]);
    }
    public function headerCTA()
    {
        return get_field('header_call_to_action', 'option');
    }

    //Footer
    public function footerLogo()
    {
        $logo = get_field('footer_logo', 'option');

        return get_image_with_focus_on($logo, 'main-branding object-contain', 'large');
    }
    public function footerMenu()
    {
        return get_field('footer_menu', 'option');
    }
    public function footerCTA()
    {
        return get_field('footer_call_to_action', 'option');
    }
    public function copyright()
    {
        return get_field('footer_copyright', 'option');
    }

    // Extras
    public static function pageForPosts()
    {
        return get_the_permalink(get_option('page_for_posts'));
    }
}



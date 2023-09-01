<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Contact extends Composer
{
    protected static $views = [
        'template-contact',
    ];

    public function with()
    {


        return [
            'content' => $this->content(),
            'form' => $this->form(),
        ];
    }
    
    public function content()    {
        return get_field('contact_settings_content');
    }
    
    public function form()    {
        return get_field('contact_settings_form_shortcode');
    }
}
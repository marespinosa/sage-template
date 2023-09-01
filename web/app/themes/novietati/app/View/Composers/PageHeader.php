<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageHeader extends Composer
{
    protected static $views = [
        'partials.page-header',
        'partials.page-header.full',
    ];

    public $headerType;
    public $contentItems;
    public $post_id;
    public $tyle;

    public function with()
    {
        $post_id = get_true_post_id();

        $this->post_id = $post_id;
        $this->headerType = get_field('page_header_settings_header', $post_id);
        $this->contentItems = get_field('page_header_settings_content', $post_id);
        $this->style = get_field('page_header_settings_style', $post_id);

        return [
            'headerType' => $this->headerType(),
            'featured' => $this->featured(),
            'featuredMobile' => $this->featuredMobile(),
            'uppertitle' => $this->uppertitle(),
            'title' => $this->title(),
            'description' => $this->description(),
            'buttons' => $this->buttons(),
        ];
    }

    public function headerType()
    {
        return $this->headerType;
    }

    public function featured()
    {

        if ($this->headerType != 'full') {
            return;
        }

        $html = '';
        $background = get_field('page_header_settings_background', $this->post_id);

        if (my_wp_is_mobile() && !empty($background['mobile'])) {
            $html = get_image_with_focus_on($background['mobile'], 'thumbnail', 'massive');

        } else {
            if (isset($background['video']['url']) && !empty($background['video'])) {
                $attachment_image = wp_get_attachment_image_url($background['desktop'], 'massive', false);

                $html = '<video class="object-cover video page-header-backgroun thumbnail" width="1920" height="1080" autoplay muted loop poster="' . $attachment_image . '">';
                $html .= '<source src="' . $background['video']['url'] . '" type="video/mp4">';

                $html .= 'Your browser does not support the video tag.</video>';
            } else {
                $html = get_image_with_focus_on($background['desktop'], 'thumbnail', 'massive');
            }
        }

        $html .= '<div class="overlay"></div>';

        return $html;
    }


    public function featuredMobile()
    {
        $background = get_field('page_header_settings_background', $this->post_id);
        
        if (isset($background['mobile']) && !empty($background['mobile'])) {

            return get_image_with_focus_on($background['mobile'], 'massive');
        }

        return false;
    }







    public function title()
    {
        if ($this->headerType == 'none' || $this->contentItems === null) {
            return;
        }

        if (!array_key_exists('title', $this->contentItems)) {
            return;
        }

        return $this->contentItems['title'];
    }





    public function uppertitle()
    {
        if ($this->headerType == 'none' || $this->contentItems === null) {
            return;
        }

        if (!array_key_exists('uppertitle', $this->contentItems)) {
            return;
        }

        return $this->contentItems['uppertitle'];
    }


    public function description()
    {
        if ($this->headerType == 'none' || $this->contentItems === null) {
            return;
        }

        if (!array_key_exists('description', $this->contentItems)) {
            return;
        }

        return $this->contentItems['description'];
    }



    public function buttons()
    {
        if ($this->headerType == 'none') {
            return;
        }
        $buttons = get_field('page_header_settings_buttons', $this->post_id);

        if (isset($buttons) && !empty($buttons)) {
            return $buttons;
        }

        return;

    }
}
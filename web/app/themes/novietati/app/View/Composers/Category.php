<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Category extends Composer
{
    protected static $views = [
        'partials.page-header.category',
    ];

    public $cat;

    public function with()
    {

        $this->cat = get_current_cat_ID();

        return [
            'blogBackLink' => $this->blogBackLink(),
            'title' => $this->title(),
            'description' => $this->description(),
        ];
    }
    
    public function blogBackLink()    {
        $page_for_posts = get_option('page_for_posts');
        $title = get_the_title($page_for_posts);
        $link = get_permalink($page_for_posts);
        return '<a class="link-on-hover" href="'.$link.'">'.$title.'</a>';
    }
    
    public function title()    {
        return get_cat_name($this->cat);
    }

    public function description()    {
        return category_description($this->cat);
    }
}
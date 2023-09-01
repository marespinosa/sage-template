<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    protected static $views = [
        'single',
        'partials.post.loop-item',
        'partials.search.loop-item',
        'partials.post.entry-categories',
    ];

    public $settings;
    public $post_ID;

    public function override()
    {
        $this->post_ID = get_the_ID();

        return [
            'title' => $this->title(),
            'categories' => $this->categories(),
            'featuredImageMedium' => $this->featuredImageMedium(),
            'link' => $this->link(),
            'excerpt' => $this->excerpt(),
            'author' => $this->author(),
            'publishedDate' => $this->publishedDate(),
            'tableContentSidebar' => $this->tableContentSidebar(),
        ];
    }

    public function featuredImageMedium()
    {
        $attachment_id = get_field('general_placeholder_image', 'option');

        if (has_post_thumbnail()) {
            $attachment_id = get_post_thumbnail_id();
        }

        return get_image_with_focus_on($attachment_id, 'thumbnail', 'medium');
    }

    public function title()
    {
        return get_the_title();
    }

    public function categories()
    {
        return wp_get_post_categories($this->post_ID);
    }

    public function link()
    {
        return get_the_permalink();
    }

    public function author()
    {
        $author_id = get_post_field('post_author', $this->post_ID);

        return '<a href="' . get_author_posts_url($author_id) . '" rel="author" class="entry-meta-author">' . get_author_name($author_id) . '</a>';
    }

    public function excerpt()
    {
        $html = '';

        if (has_excerpt()) {
            $html = '<p class="excerpt mt-4">' . get_the_excerpt() . '</p>';
        }

        return $html;
    }

    public function publishedDate()
    {
        return '<time class="entry-meta-updated" datetime="' . get_post_time('c', true) . '">' . get_the_date('j F, Y') . '</time>';
    }

    public function tableContentSidebar()
    {

        $list = $matches = array();

        $content = get_post_field('post_content', get_the_ID());
        $regex = '#<(h[2-3])(.*?)>(.*?)</\1>#si';
        preg_match_all($regex, $content, $matches);

        if ($matches) {
            foreach ($matches[0] as $key => $value) {

                $class = str_contains($value, 'h3') ? 'h3 pl-6' : 'h2';

                $stripped_tags = wp_strip_all_tags($value);

                $list[] = array(
                    'text' => $stripped_tags,
                    'class' => 'item-' . $class,
                    'sanitize' => sanitize_title($stripped_tags) . '-' . $key,
                );
            }
        }

        return $list;
    }

    public static function shortLoop($qty = 4)
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => $qty,
        );

        $query = new \WP_Query($args);
        return $query->posts;
    }
}

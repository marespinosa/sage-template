<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Author extends Composer
{
    protected static $views = [
        'partials.page-header.author',
        'partials.post.author-profile',
    ];

    public $author;

    public function with()
    {

        $this->author = get_user_by('slug', get_query_var('author_name'));

        if (!$this->author) {
            $this->author = get_the_author_ID();
        } else {
            $this->author = $this->author->ID;
        }

        return [
            'authorName' => $this->authorName(),
            'authorBio' => $this->authorBio(),
            'authorID' => $this->authorID(),
            'authorSocialMedias' => $this->authorSocialMedias(),
            'authorPostsCount' => $this->authorPostsCount(),
            'authorPage' => $this->authorPage(),
        ];
    }

    public function authorID()
    {
        return $this->author;
    }

    public function authorName()
    {
        return get_author_name($this->author);
    }

    public function authorBio()
    {
        return get_the_author_meta('description', $this->author);
    }

    public function authorSocialMedias()
    {
        return get_field('social_medias', 'user_' . $this->author);
    }

    public function authorPostsCount()
    {

        $post_count = count_user_posts($this->author);

        $sufix = $post_count > 1 ? 'Articles' : 'Article';

        return "$post_count $sufix";

    }

    public function authorPage()
    {

        return get_author_posts_url($this->author);

    }
}

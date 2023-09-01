<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Search extends Composer
{
    protected static $views = [
        'search',
    ];

    public $query;

    public function with()
    {
        $_query = isset($_GET['s']) && !empty($_GET['s']) ? $this->searchQuery() : array();
        $this->query = $_query;

        return [
            'title' => $this->title(),
            'description' => $this->description(),
            'query' => $this->query(),
            'max_num_pages' => $this->max_num_pages(),
            'paged' => $this->paged(),
        ];
    }

    public function title()
    {
        return empty($this->query) ? 'Search Page' : 'Search Results For: ' . $_GET['s'];
    }

    public function description()
    {

        if (!empty($this->query)) {
            $found = $this->query->found_posts;
            $label = $this->query->found_posts > 1 ? 'items' : 'item';

            return "About $found $label found.";
        }

        return '';
    }

    public function query()
    {
        return empty($this->query) ? $this->query : $this->query->posts;
    }

    public function max_num_pages()
    {
        if (!empty($this->query)) {
            $this->query->max_num_pages;
        }

        return false;
    }

    public function paged()
    {
        if (!empty($this->query)) {
            $this->query->query['paged'];
        }

        return false;
    }

    private function searchQuery()
    {
        add_filter('posts_where', 'title_filter', 10, 2);
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => array('post', 'page'),
            'post_status' => 'publish',
            'paged' => $paged,
            'page' => $paged,
            'search_title' => $_GET['s'],
            'posts_per_page' => -1,
        );

        $query = new \WP_Query($args);

        remove_filter('posts_where', 'title_filter', 10, 2);

        return $query;
    }

}

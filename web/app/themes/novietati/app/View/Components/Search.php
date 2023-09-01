<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Search extends Component
{
    public $s;

    public function __construct($s = false)
    {
        $this->s = $_GET['s'] ?? '';
    }

    public function render()
    {
        return $this->view('components.search');
    }
}
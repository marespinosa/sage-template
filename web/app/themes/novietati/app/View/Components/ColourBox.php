<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ColourBox extends Component
{
    public $type;
    public $title;
    public $size;

    public function __construct($type = null, $title = null, $size = null)
    {
        $this->type = $type;
        $this->title = $title;
        $this->size = $size;
    }

    public function render()
    {
        return $this->view('components.style-guide.colour-box');
    }
}

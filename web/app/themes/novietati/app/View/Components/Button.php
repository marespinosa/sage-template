<?php

namespace App\View\Components;
//test
use Roots\Acorn\View\Component;

class Button extends Component
{
    public $class;
    public $href;
    public $target;

    public function __construct($class = null, $href = null, $target = null)
    {
        $this->class = $class;
        $this->href = $href;
        $this->target = $target;
    }

    public function render()
    {
        return $this->view('components.button');
    }
}

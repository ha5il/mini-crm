<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Anchor extends Component
{
    public $text;

    public function __construct($text = '')
    {
        $this->text = ucfirst($text);
    }

    public function render()
    {
        return view('components.anchor');
    }
}

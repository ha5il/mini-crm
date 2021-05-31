<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableHead extends Component
{
    public $headings;

    public function __construct($headings = [])
    {
        $this->headings = $headings;
    }

    public function render()
    {
        return view('components.table-head');
    }
}

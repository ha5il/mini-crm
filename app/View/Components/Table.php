<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $headings;

    public function __construct(array $headings = [])
    {
        $this->headings = $headings;
    }

    public function render()
    {
        return view('components.table');
    }
}

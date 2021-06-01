<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class FormSelect extends Component
{
    public $fieldName;
    public $options;
    public $value;
    public $label;
    public $hasLiveWire;
    public $liveWireMode;
    public $readonly;
    public $disabled;

    public function __construct($fieldName, ?array $options, $label = null, $value = '', $hasLiveWire = false, $liveWireMode = 'defer', $readonly = false, $disabled = false)
    {
        $this->fieldName = $fieldName;
        $this->options = $options ?: [];
        $this->value = $value;
        $this->label = $label ?: Str::of($fieldName)->snake()->replaceMatches("/[._]/", ' ');
        $this->hasLiveWire = $hasLiveWire;
        $this->liveWireMode = $liveWireMode;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.form-select');
    }
}

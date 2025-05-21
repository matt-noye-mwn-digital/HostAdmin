<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInputField extends Component
{
    public $label;
    public $name;
    public $required;
    public $selectedValue;
    public $options;
    public $collection;
    public $displayField;
    public function __construct($label, $name, $required = false, $selectedValue = null, $options = [], $collection = null, $displayField = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->selectedValue = $selectedValue;
        $this->options = $options;
        $this->collection = $collection;
        $this->displayField = $displayField;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select-input-field');
    }
}

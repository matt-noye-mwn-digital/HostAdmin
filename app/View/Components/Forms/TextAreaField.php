<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextAreaField extends Component
{
    public $label;
    public $name;
    public $required;
    public $value;
    public $isTinyEditor;
    public function __construct($label, $name, $required = false, $value = null, $isTinyEditor = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->value = $value;
        $this->isTinyEditor = $isTinyEditor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.text-area-field');
    }
}

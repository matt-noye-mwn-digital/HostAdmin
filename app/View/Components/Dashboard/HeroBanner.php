<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroBanner extends Component
{
    public $title;
    public $content;
    public $buttonContent;
    public $buttonLink;
    public $displayButton;
    public $buttonIcon;
    public function __construct($title, $displayButton, $buttonContent = NULL, $buttonLink = NULL, $buttonIcon = NULL, $content = NULL)
    {
        $this->title = $title;
        $this->content = $content;
        $this->displayButton = $displayButton;
        $this->buttonContent = $buttonContent;
        $this->buttonLink = $buttonLink;
        $this->buttonIcon = $buttonIcon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.hero-banner');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubscriberStatBox extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon;
    public $title;
    public $value;
    public $subtitle;
    public $count;

    public function __construct($icon, $title, $value = null, $subtitle = null, $count = null)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->value = $value;
        $this->subtitle = $subtitle;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.subscriber-stat-box');
    }
}

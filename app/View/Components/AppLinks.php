<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLinks extends Component
{
    public ?string $appleLink;
    public ?string $googleLink;

    public function __construct($appleLink = null, $googleLink = null)
    {
        $this->appleLink = $appleLink;
        $this->googleLink = $googleLink;
    }

    public function render()
    {
        return view('components.app-links');
    }
}

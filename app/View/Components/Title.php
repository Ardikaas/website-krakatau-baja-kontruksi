<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Title extends Component
{
    public string $type;
    public string $title;
    public array $breadcrumb;

    public function __construct(
        $type = 'hero',
        $title = '',
        $breadcrumb = []
    ) {
        $this->type = $type;
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    public function render()
    {
        return view('components.landingPageSection1');
    }
}

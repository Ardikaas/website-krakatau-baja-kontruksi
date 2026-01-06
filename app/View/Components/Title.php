<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    public string $type;
    public string $title;
    public array $breadcrumb;
    public ?string $imagePath;

    public function __construct(
        string $type = 'hero',
        string $title = '',
        array $breadcrumb = [],
        ?string $imagePath = null
    ) {
        $this->type = $type;
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
        $this->imagePath = $imagePath;
    }

    public function render()
    {
        return view('components.landingPageSection1');
    }
}

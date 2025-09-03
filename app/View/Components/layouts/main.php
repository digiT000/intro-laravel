<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class main extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $description;
    public function __construct(string $title,string $description)
    {
        $this->title = "{$title} | Laravel";
        $this->description= $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.main');
    }
}

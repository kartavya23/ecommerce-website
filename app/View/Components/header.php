<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $description;
    public $keywords;
    public function __construct($title,$description,$keywords)
    {
        //
        $this->title=$title;
        $this->description=$description;
        $this->keywords=$keywords;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}

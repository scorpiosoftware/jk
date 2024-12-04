<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class bestSeller extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $bestSeller , public $title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.best-seller');
    }
}

<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public function __construct()
    {
        $this->items=Category::where('parent_id',null)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}

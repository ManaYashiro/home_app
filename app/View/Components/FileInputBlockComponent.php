<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FileInputBlockComponent extends Component
{
    public $alldata;
    public function __construct($alldata = [])
    {
        $this->alldata = $alldata;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-input-block-component');
    }
}

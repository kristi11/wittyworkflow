<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Location extends Component
{
//    public $lat = -25.344;
//    public $lng = 131.031;
    public $lat;
    public $lng;
    public function render(): View
    {
        return view('components.location');
    }
}

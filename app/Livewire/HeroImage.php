<?php

namespace App\Livewire;

use App\Models\Hero;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class HeroImage extends Component
{
    public function placeholder(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('placeholder');
    }
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.hero-image',
            [
                'hero' => Hero::first()
            ]);
    }
}

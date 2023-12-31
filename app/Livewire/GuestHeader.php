<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\BusinessHour;
use App\Models\Hero;
use App\Models\Seo;
use App\Models\Social;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class GuestHeader extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.guest-header',
            [
                'hero' => Hero::firstOrFail(),
                'seo' => Seo::first(),
                'address' => Address::first(),
                'businessHours' => BusinessHour::all(),
                'social' => Social::first(),
            ]);
    }
}

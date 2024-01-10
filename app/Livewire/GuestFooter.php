<?php

namespace App\Livewire;

use App\Models\Social;
use Livewire\Component;

class GuestFooter extends Component
{
    public $socials;

    public function mount()
    {
        $this->socials = Social::first();
    }

    public function render()
    {
        return view('livewire.guest-footer',
        [
            'socials' => Social::first(),
        ]);
    }
}

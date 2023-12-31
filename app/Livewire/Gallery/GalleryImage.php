<?php

namespace App\Livewire\Gallery;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GalleryImage extends Component
{

    public $gallery;

    public function mount($gallery): void
    {
        $this->gallery = $gallery;
    }

    public function placeholder(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('placeholder');
    }

        public function render(): Application|Factory|View
    {
        return view('livewire.gallery.gallery-image');
    }
}

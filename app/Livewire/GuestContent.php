<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use LaravelIdea\Helper\App\Models\_IH_Gallery_C;
use LaravelIdea\Helper\App\Models\_IH_Service_C;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property true $showGalleryModal
 * @property Gallery|Gallery[]|_IH_Gallery_C|null $gallery
 * @property Service|Service[]|_IH_Service_C|null $service
 */
class GuestContent extends Component
{
    use WithPagination;
    public $gallery;
    public $service;
    public $appointmentsVisibility;
    public $alwaysOpen;
    public $flexiblePricing;
    public $showGalleryImageModal = false;
    public $showServicesDescriptionModal = false;

    public function mount(Gallery $gallery, Service $service): void
    {
        $this->gallery = $gallery;
        $this->service = $service;
        // Retrieve the value directly
        $this->appointmentsVisibility = Setting::value('appointmentsVisibility') ?? false;
        $this->alwaysOpen = Setting::value('alwaysOpen') ?? false;
        $this->flexiblePricing = Setting::value('flexiblePricing') ?? false;
    }

    public function expandCustomerImage($galleryId): void
    {
        $this->gallery = Gallery::find($galleryId);
        $this->showGalleryImageModal = true;
    }

    public function showServicesDescription($serviceId): void
    {
        $this->service = Service::find($serviceId);
        $this->showServicesDescriptionModal = true;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.guest-content', [
            'admins'=> User::where('role', 'admin')->get(),
            'hero' =>Hero::firstOrFail(),
            'address' => Address::firstOrFail(),
            'services' => Service::paginate(6),
            'hours' => BusinessHour::all(),
            'galleries' => Gallery::paginate(6),
            'social' => Social::first(),
        ]);
    }
}

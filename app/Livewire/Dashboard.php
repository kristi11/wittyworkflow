<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Dashboard extends Component
{
    public $appointmentsVisibility;
    public $alwaysOpen;
    public $flexiblePricing;

    public function mount(): void
    {
        // Retrieve the value directly
        $this->appointmentsVisibility = Setting::value('appointmentsVisibility') ?? false;
        $this->alwaysOpen = Setting::value('alwaysOpen') ?? false;
        $this->flexiblePricing = Setting::value('flexiblePricing') ?? false;
    }

    public function toggleAppointmentsVisibility(): void
    {
        $this->appointmentsVisibility = !$this->appointmentsVisibility;

        // Update or create the setting record
        Setting::updateOrCreate(
            ['user_id' => 1],
            ['appointmentsVisibility' => $this->appointmentsVisibility],
        );

        $this->dispatch('notify', 'Appointments visibility changed!');
    }

    public function togglePricing(): void
    {
        $this->flexiblePricing = !$this->flexiblePricing;
        Setting::updateOrCreate(
            ['user_id' => 1],
            ['flexiblePricing' => $this->flexiblePricing],
        );
        $this->dispatch('notify', 'Pricing flexibility changed!');
    }

    public function toggleAlwaysOpen(): void
    {
        $this->alwaysOpen = !$this->alwaysOpen;

        // Update or create the setting record
        Setting::updateOrCreate(
            ['user_id' => 1],
            ['alwaysOpen' => $this->alwaysOpen],
        );

        $this->dispatch('notify', 'Always open status changed!');
    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.dashboard', [
            'users' => User::query('id')->get(),
            'hero' => Hero::firstOrFail(),
            'services' => Service::query('id')->get(),
            'address' => Address::firstOrFail(),
            'businessHours' => BusinessHour::query('id')->get(),
            'appointments' => Appointment::whereIn('appointment_status', ['pending', 'confirmed', 'rescheduled'])
                ->get()
                ->sortBy('date'),
            'userAppointments' => Appointment::where('user_id', auth()->user()->id)
                ->whereIn('appointment_status', ['pending', 'confirmed', 'rescheduled'])
                ->get(),
            'userServices' => Service::query('name')->get(),
            'galleries' => Gallery::limit(4)->get(),
            'socials' => Social::first(),
            'seo' => Seo::first(),
            'visibility' => Setting::all(),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Social;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Dashboard extends Component
{
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
        ]);
    }
}

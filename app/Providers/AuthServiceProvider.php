<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Address;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Policies\AddressPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\BusinessHourPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\HeroPolicy;
use App\Policies\SeoPolicy;
use App\Policies\ServicePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SocialPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Address::class => AddressPolicy::class,
        Appointment::class => AppointmentPolicy::class,
        BusinessHour::class => BusinessHourPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Hero::class => HeroPolicy::class,
        Seo::class => SeoPolicy::class,
        Service::class => ServicePolicy::class,
        Setting::class => SettingPolicy::class,
        Social::class => SocialPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

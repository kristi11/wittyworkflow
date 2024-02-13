<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'appointmentsVisibility' => true,
            'hoursVisibility' => true,
            'galleriesVisibility' => true,
            'servicesVisibility' => true,
            'socialsVisibility' => true,
            'seoVisibility' => true,
            'addressVisibility' => true,
            'heroVisibility' => true,
            'alwaysOpen' => false,
            'flexiblePricing' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

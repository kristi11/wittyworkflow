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
            'appointmentsVisibility' => false,
            'hoursVisibility' => false,
            'galleriesVisibility' => false,
            'servicesVisibility' => false,
            'socialsVisibility' => false,
            'seoVisibility' => false,
            'addressVisibility' => false,
            'heroVisibility' => false,
            'alwaysOpen' => false,
            'flexiblePricing' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

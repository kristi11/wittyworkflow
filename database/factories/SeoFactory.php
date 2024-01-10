<?php

namespace Database\Factories;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SeoFactory extends Factory
{
    protected $model = Seo::class;

    public function definition(): array
    {
        return [
            'user_id' => '1',
            'title' => config('app.name'),
            'description' => 'Boost your online presence with services, appointment management, a stunning gallery, and customizable features. Elevate your business effortlessly!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HeroFactory extends Factory
{
    protected $model = Hero::class;

    public function definition(): array
    {
        return [
            'user_id' => '1',
            'mainQuote' => 'Your business needs, all in one place',
            'secondaryQuote' => 'Manage your appointments ',
            'thirdQuote' => '...and much more',
            'gradientDegree' => '160',
            'gradientFirstColor' => '#000046',
            'gradientDegreeStart' => '0',
            'gradientSecondColor' => '#1cb5e0',
            'gradientDegreeEnd' => '100',
            'image' => 'business-hero.jpg',
            'waves' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

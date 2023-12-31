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
            'mainQuote' => 'First quote goes here',
            'secondaryQuote' => 'Second quote goes here',
            'thirdQuote' => 'Third quote goes here',
            'gradientDegree' => '90',
            'gradientFirstColor' => '#d53369',
            'gradientDegreeStart' => '0',
            'gradientSecondColor' => '#daae51',
            'gradientDegreeEnd' => '100',
            'image' => 'hero-1.png',
            'waves' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\BusinessHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessHourFactory extends Factory
{
    protected $model = BusinessHour::class;

    public function definition(): array
    {
        return [
            'day' => $this->faker->unique()->dayOfWeek(),
            'open_from' => $this->faker->time($format = 'h:i A'),
            'open_until' => $this->faker->time($format = 'h:i A', $max = '12:00 PM'),
            'open' => $this->faker->boolean(),
            'phone' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\BusinessHour;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessHourFactory extends Factory
{
    protected $model = BusinessHour::class;

    public function definition(): array
    {
        $open = $this->faker->boolean();

        return [
            'user_id' => '1',
            'day' => $this->faker->unique()->dayOfWeek(),
            'open' => $open,
            'open_from' => $open ? $this->faker->time() : null,
            'open_until' => $open ? $this->faker->time() : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

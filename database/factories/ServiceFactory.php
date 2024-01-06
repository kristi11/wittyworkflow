<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => 'Your services go here',
            'description' => 'Welcome to this awesome space where you get to showcase not just yourself but also the fantastic services your business brings to the table. It\'s your chance to shout from the digital rooftops about how you and your offerings can make a real impact on the world. Imagine this paragraph popping up in multiple service banners on the platform\'s public page, giving everyone a taste of the awesomeness you\'re ready to unleash. So, what are you waiting for? Let the world know why your services are the ones they\'ve been waiting for!',
            'price' => $this->faker->numberBetween(100, 1000),
            'estimated_hours' => $this->faker->numberBetween(1, 12),
            'estimated_minutes' => $this->faker->numberBetween(0, 59),
            'extra_description' => 'This text is for demonstration purposes only.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

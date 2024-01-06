<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'user_id' => '1',
            'description' => '
Behold, these images are here to give you a sneak peek of what\'s possible. They\'re all for demonstration, little teasers to spark your imagination. Picture this: you\'ve chosen services, and now it\'s time to unleash galleries of diverse photos that perfectly align with those selections. Let these visuals do the talking, showcasing the essence of what your chosen services are all about. This isn\'t just about uploading images, it\'s about creating visual symphonies that speak volumes about your chosen services. Please note, the images shown are only for demonstration purposes. When using this code for your own project, you should delete these images and upload relevant ones. Let the showcase begin!',
            'applied_to' => 'Your services go here',
            'path' => 'services.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

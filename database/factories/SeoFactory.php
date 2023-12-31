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
            'description' => 'Description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

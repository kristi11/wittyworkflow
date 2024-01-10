<?php

namespace Database\Factories;

use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SocialFactory extends Factory
{
    protected $model = Social::class;

    public function definition(): array
    {
        return [
            'user_id' => '1',
            'instagram' => 'kristitanellari/',
            'facebook' => 'kristi.tanellari1',
            'twitter' => 'TanellariKristi',
            'linkedin' => 'kristi-tanellari/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

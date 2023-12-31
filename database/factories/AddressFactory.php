<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'user_id' => '1',
            'name' => 'Test Address',
            'street' => '123 Test Street',
            'city' => 'Test City',
            'state' => 'Test State',
            'zip' => '12345',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

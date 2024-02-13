<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->withPersonalTeam()->create();
        User::factory()->secondRow()->withPersonalTeam()->create(); // Creates the second row with different values
        Hero::factory()->create();
        Service::factory()->count(6)->create();
        Address::factory()->create();
        Gallery::factory()->count(6)->create();
        Seo::factory()->create();
        BusinessHour::factory()->count(7)->create();
        Social::factory()->create();
        Setting::factory()->create();
    }
}

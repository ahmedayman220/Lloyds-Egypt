<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ServiceCategory;
use App\Models\ServiceItem;
use Database\Factories\ServiceCategoryFactory;
use Database\Factories\ServiceItemFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            BannerSeeder::class,
            SettingSeeder::class,
            AboutSeeder::class,
            MissionSeeder::class,
        ]);
        ServiceCategory::factory()->count(5)->create();
        ServiceItem::factory()->count(40)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}

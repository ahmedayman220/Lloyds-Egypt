<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Companies;
use App\Models\Courses;
use App\Models\Instructors;
use App\Models\ServiceCategory;
use App\Models\ServiceItem;
use App\Models\SupplierCategory;
use App\Models\SupplierItem;
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
        ServiceItem::factory()->count(10)->create();
        SupplierCategory::factory()->count(5)->create();
        SupplierItem::factory()->count(10)->create();
        Companies::factory()->count(5)->create();
        Instructors::factory()->count(5)->create();
        Courses::factory()->count(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}

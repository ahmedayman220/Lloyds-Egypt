<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert(
            [
                'address' => '205 Fida Walinton, Tongo New York, Canada',
                'email' => 'email@email.com',
                'phone' => '987-0986-0987',
                'facebook_link' => 'https://www.google.com/',
                'twitter_link' => 'https://www.google.com/',
                'whatsapp_link' => 'https://www.google.com/',
                'app_favicon' => 'setting/upload/logo-sm.png'
            ]
        );
    }
}

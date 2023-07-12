<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'title' => 'Huruma',
            'short_title' => 'He Who Has No Charity In Life No Mercy.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing incididunt ut laboredolore magna aliqua elsed tempomet scing.',
            'images' => json_encode(['banners/1.png', 'banners/2.png', 'banners/3.png']),
        ]);

    }
}

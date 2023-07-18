<?php

namespace Database\Factories;

use App\Models\SupplierCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierItem>
 */
class SupplierItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph,
            'image' => 'supplier_items/page-title-bg.jpg',
            'category_id' => function() {
                return SupplierCategory::inRandomOrder()->first()->id;
            }
        ];
    }
}

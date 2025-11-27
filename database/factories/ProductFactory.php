<?php

namespace Database\Factories;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'brand' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'seller_id' => Seller::factory(),
            'category_id' => Category::factory(),
            'is_active' => $this->faker->boolean(),
            'status' => $this->faker->randomElement([
                ProductStatusEnum::AVAILABLE(),
                ProductStatusEnum::LOWSTOCK(),
                ProductStatusEnum::OUTOFSTOCK(),
            ]),
        ];
    }
}

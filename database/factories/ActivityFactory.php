<?php

namespace Database\Factories;

use App\Models\ActivityCategory;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adultPrice = $this->faker->randomFloat(2, 20, 400);
        $childPrice = $this->faker->boolean(70) ? $this->faker->randomFloat(2, 10, $adultPrice) : null;

        return [
            'category_id' => ActivityCategory::factory(),
            'establishment_id' => Establishment::factory(),
            'name' => $this->faker->catchPhrase(),
            'description' => $this->faker->optional(70)->paragraphs(2, true),
            'duration_minutes' => $this->faker->numberBetween(30, 360),
            'max_participants' => $this->faker->numberBetween(1, 50),
            'min_age' => $this->faker->numberBetween(0, 12),
            'max_age' => $this->faker->numberBetween(13, 80),
            'adult_price' => $adultPrice,
            'child_price' => $childPrice,
            'main_image_path' => $this->faker->optional(60)->imageUrl(1280, 720, 'activities', true),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'average_rating' => $this->faker->randomFloat(2, 0, 5),
            'total_reviews' => $this->faker->numberBetween(0, 5000),
        ];
    }
}

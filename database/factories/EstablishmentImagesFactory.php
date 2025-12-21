<?php

namespace Database\Factories;

use App\Models\Establishment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstablishmentImages>
 */
class EstablishmentImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'establishment_id' => Establishment::factory(),
            'url' => $this->faker->imageUrl(800, 600, 'establishments', true),
            'description' => $this->faker->optional()->sentence(),
            'order' => $this->faker->numberBetween(0, 10),
            'uploaded_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}

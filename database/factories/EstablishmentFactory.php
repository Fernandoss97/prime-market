<?php

namespace Database\Factories;

use App\Models\EstablishmentCategory;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Establishment>
 */
class EstablishmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Relations
            'seller_id' => Seller::factory(),
            'category_id' => EstablishmentCategory::factory(),

            // Basic info
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),

            // Address
            'address' => $this->faker->streetAddress(),
            'number' => (string) $this->faker->numberBetween(1, 9999),
            'complement' => $this->faker->secondaryAddress(),
            'neighborhood' => $this->faker->citySuffix(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip_code' => $this->faker->postcode(),
            'latitude' => $this->faker->latitude(-33.0, 5.0),
            'longitude' => $this->faker->longitude(-74.0, -34.0),

            // Additional info
            'logo' => $this->faker->imageUrl(300, 300, 'business', true),
            'cover_photo' => $this->faker->imageUrl(1200, 400, 'business', true),
            'opening_hours' => $this->faker->randomElement([
                json_encode([
                    'mon' => '09:00-18:00',
                    'tue' => '09:00-18:00',
                    'wed' => '09:00-18:00',
                    'thu' => '09:00-18:00',
                    'fri' => '09:00-18:00',
                    'sat' => '10:00-14:00',
                    'sun' => null,
                ]),
            ]),
            'capacity' => $this->faker->numberBetween(10, 500),

            // Control
            'featured' => $this->faker->boolean(10),
            'average_rating' => $this->faker->randomFloat(2, 0, 5),
            'total_reviews' => $this->faker->numberBetween(0, 1000),
        ];
    }
}

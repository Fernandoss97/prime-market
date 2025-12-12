<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'surname' => $this->faker->lastName(),
            'user_id' => User::factory(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'birth_date' => $this->faker->date(),
        ];
    }
}

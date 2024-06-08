<?php

namespace Database\Factories;

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
            'firstName' => fake()->firstName,
            'lastName' => fake()->lastName,
            'password' => bcrypt('secret'),
            'role' => fake()->randomElement(['Customer', 'Admin', 'Vendor']),
            'email' => fake()->unique()->safeEmail,
            'registrationDate' => fake()->dateTimeThisYear()
        ];
    }
}

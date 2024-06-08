<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'customerID' => $this->faker->unique()->numberBetween(1, 1000),
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'password' => Hash::make('password'), // password
            'role' => $this->faker->randomElement(['admin', 'user']),
            'email' => $this->faker->unique()->safeEmail,
            'registrationDate' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

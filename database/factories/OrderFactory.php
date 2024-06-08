<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productID' => \App\Models\Product::pluck('productID')->random(),
            'customerID' => \App\Models\Customer::pluck('customerID')->random(),
            'destination' => fake()->address,
            'deliveryStatus' => fake()->randomElement(['Pending', 'Delivered']),
            'paymentStatus' => fake()->randomElement(['Pending', 'Paid']),
            'orderAmount' => fake()->randomNumber(2),
            'orderDate' => fake()->dateTimeThisYear()
        ];
    }
}

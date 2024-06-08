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
            'destination' => $this->$faker->address,
            'deliveryStatus' => $this->$faker->randomElement(['Pending', 'Delivered']),
            'paymentStatus' => $this->$faker->randomElement(['Pending', 'Paid']),
            'orderAmount' => $this->$faker->randomNumber(2),
            'orderDate' => $this->$faker->dateTimeThisYear()
        ];
    }
}

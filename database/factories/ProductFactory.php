<?php

namespace Database\Factories;

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
            'productName' => $this->$faker->word,
            'categoryID' => \App\Models\Category::pluck('categoryID')->random(),
            'price' => $this->$faker->numberBetween(100, 10000),
            'stockAmount' => $this->$faker->numberBetween(0, 100),
            'vendorID' => \App\Models\Customer::where('role', 'Vendor')->pluck('customerID')->random(),
            'productDescription' => $this->$faker->sentence,
            'imageUrl' => $this->$faker->imageUrl(640, 480, 'technics')
        ];
    }
}

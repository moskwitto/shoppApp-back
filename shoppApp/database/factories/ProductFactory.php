<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productID' => $this->faker->unique()->numberBetween(1, 1000),
            'productName' => $this->faker->word,
            'categoryID' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stockAmount' => $this->faker->numberBetween(1, 100),
            'vendorID' => $this->faker->numberBetween(1, 10),
            'productDescription' => $this->faker->sentence,
            'productImage' => 'https://via.placeholder.com/150',
        ];
    }
}
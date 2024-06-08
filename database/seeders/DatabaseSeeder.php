<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(5)->create();
        Category::factory()->count(5)->create();
        Product::factory()->count(50)->create();
        Order::factory()->count(20)->create();
    }
}

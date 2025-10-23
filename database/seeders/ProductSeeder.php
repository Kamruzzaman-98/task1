<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'Apple', 'price' => 200]);
        Product::create(['name' => 'Banana', 'price' => 50]);
        Product::create(['name' => 'Mango', 'price' => 100]);
        Product::create(['name' => 'Orange', 'price' => 300]);
    }
}

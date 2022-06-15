<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
            ["name" => "Banana", "price" => 100],
            ["name" => "Phone", "price" => 200],
            ["name" => "PC", "price" => 999],
            ["name" => "Mouse", "price" => 20],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

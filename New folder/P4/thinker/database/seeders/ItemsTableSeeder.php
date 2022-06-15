<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ["name" => "Banana", "type" => "100"],
            ["name" => "Phone", "type" => "200"],
            ["name" => "PC", "type" => "999"],
            ["name" => "Mouse", "type" => "20"],
        ];
        foreach ($items as $item) {
            Item::create($item);
        }
    
    }
}

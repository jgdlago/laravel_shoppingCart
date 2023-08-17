<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {

    public function run(): void {
        Product::insert([
            [
                'name' => 'Café',
                'description' => 'Café tradicional de intensidade 8',
                'price' => 10.99,
                'unit_of_measurement' => '500g',
            ],
            [
                'name' => 'Café',
                'description' => 'Café tradicional de intensidade 5',
                'price' => 16.90,
                'unit_of_measurement' => '1kg',
            ]
        ]);

    }
}

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
                'name' => 'Monster',
                'description' => 'Energético sabor manga',
                'price' => 07.90,
                'unit_of_measurement' => '477ml',
            ],
            [
                'name' => 'Pizza',
                'description' => 'Pizza congelada de calabresa',
                'price' => 18.90,
                'unit_of_measurement' => '400g',
            ]
        ]);

    }
}

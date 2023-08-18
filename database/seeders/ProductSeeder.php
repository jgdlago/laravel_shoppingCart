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
                'product_code' => 'ABC123',
                'description' => 'Café tradicional de intensidade 8',
                'price' => 10.99,
                'unit_of_measurement' => '500g',
            ],
            [
                'name' => 'Monster',
                'product_code' => 'CFS231',
                'description' => 'Energético sabor manga',
                'price' => 07.90,
                'unit_of_measurement' => '477ml',
            ],
            [
                'name' => 'Pizza',
                'product_code' => 'GS342',
                'description' => 'Pizza congelada de calabresa',
                'price' => 18.90,
                'unit_of_measurement' => '400g',
            ]
        ]);

    }
}

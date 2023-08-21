<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {

    public function run(): void {
        Product::insert([
            [
                'name' => 'Biscoito recheado',
                'product_code' => 'AL3',
                'description' => 'Biscoito recheado morango',
                'price' => 10.99,
                'unit_of_measurement' => '1 un',
            ],
            [
                'name' => 'Energético',
                'product_code' => 'BD1',
                'description' => 'Energético sabor manga',
                'price' => 7.99,
                'unit_of_measurement' => '473ml',
            ],
            [
                'name' => 'Vinho',
                'product_code' => 'BD2',
                'description' => 'Vinho Chileno Reservado Cabernet Sauvignon',
                'price' => 21.90,
                'unit_of_measurement' => '750ml',
            ]
        ]);

    }
}

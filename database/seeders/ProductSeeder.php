<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Café',
                'product_code' => 'AL1',
                'description' => 'Café (1 KG)',
                'price' => 10.90,
                'unit_of_measurement' => '1 KG',
            ],
            [
                'name' => 'Energético',
                'product_code' => 'BD1',
                'description' => 'Energético (473ml)',
                'price' => 7.99,
                'unit_of_measurement' => '473ml',
            ],
            [
                'name' => 'Conjunto de Potes',
                'product_code' => 'UT1',
                'description' => 'Conjunto de Potes (4 un)',
                'price' => 25.70,
                'unit_of_measurement' => '4 un',
            ],
            [
                'name' => 'Molho de Tomate',
                'product_code' => 'AL2',
                'description' => 'Molho de Tomate (500 gr)',
                'price' => 6.50,
                'unit_of_measurement' => '500 gr',
            ],
            [
                'name' => 'Biscoito Recheado',
                'product_code' => 'AL3',
                'description' => 'Biscoito Recheado (1 un)',
                'price' => 2.90,
                'unit_of_measurement' => '1 un',
            ],
            [
                'name' => 'Amaciante',
                'product_code' => 'LP1',
                'description' => 'Amaciante (2l)',
                'price' => 6.49,
                'unit_of_measurement' => '2l',
            ],
            [
                'name' => 'Vinho',
                'product_code' => 'BD2',
                'description' => 'Vinho (750ml)',
                'price' => 21.90,
                'unit_of_measurement' => '750ml',
            ],
            [
                'name' => 'Creme Dental',
                'product_code' => 'HG1',
                'description' => 'Creme Dental (1 un)',
                'price' => 11.90,
                'unit_of_measurement' => '1 un',
            ],
            [
                'name' => 'Desinfetante',
                'product_code' => 'LP2',
                'description' => 'Desinfetante (500 ml)',
                'price' => 3.15,
                'unit_of_measurement' => '500 ml',
            ],
            [
                'name' => 'Suco Uva',
                'product_code' => 'BD3',
                'description' => 'Suco Uva (450 ml)',
                'price' => 4.19,
                'unit_of_measurement' => '450 ml',
            ],
            [
                'name' => 'Massa Penne',
                'product_code' => 'AL4',
                'description' => 'Massa Penne (500 gr)',
                'price' => 3.57,
                'unit_of_measurement' => '500 gr',
            ],
            [
                'name' => 'Papel Higiênico',
                'product_code' => 'HG2',
                'description' => 'Papel Higiênico (4 rolos)',
                'price' => 7.65,
                'unit_of_measurement' => '4 rolos',
            ],
            [
                'name' => 'Creme de leite',
                'product_code' => 'AL5',
                'description' => 'Creme de leite (200g)',
                'price' => 3.25,
                'unit_of_measurement' => '200g',
            ],
        ]);
    }
}

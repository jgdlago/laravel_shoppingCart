<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder {
    public function run(): void {
        Cart::create(
            [
                'total_price' => 0,
                'promotional_product_codes' => json_encode(['AL1', 'BD1', 'UT1']),
            ]
        );
    }
}

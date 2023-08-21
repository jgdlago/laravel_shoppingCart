<?php

namespace Database\Seeders;

use App\Models\Cart_items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cart_ItemsSeeder extends Seeder {

    public function run(): void {
        Cart_items::insert([
            [
                'cart_id' => 1,
                'product_id' => 14,
                'quantity' => 4
            ],
            [
                'cart_id' => 1,
                'product_id' => 15,
                'quantity' => 6
            ]
        ]);
    }
}

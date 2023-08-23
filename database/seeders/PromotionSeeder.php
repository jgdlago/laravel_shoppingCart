<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder {

    public function run(): void {
        Promotion::insert([
            [
                'product_code' => 'AL3',
                'rules' => json_encode([
                    'promotion_type' => 'buy_1_get_1',
                    'rules' => [
                        'min_quantity' => 1
                    ]
                ]),
            ],
            [
                'product_code' => 'BD1',
                'rules' => json_encode([
                    'promotion_type' => 'min_amount',
                    'rules' => [
                        'min_quantity' => 6,
                        'promotion_price' => 7.50,
                    ]
                ]),
            ],
            [
                'product_code' => 'AL5',
                'rules' => json_encode([
                    'promotion_type' => 'min_amount',
                    'rules' => [
                        'min_quantity' => 3,
                        'promotion_price' => 3.00,
                    ]
                ]),
            ],
            [
                'product_code' => 'BD2',
                'rules' => json_encode([
                    'promotion_type' => 'buy_3_get_1',
                    'rules' => [
                        'min_quantity' => 3
                    ]
                ]),
            ],
            [
                'product_code' => 'BD3',
                'rules' => json_encode([
                    'promotion_type' => 'buy_4_get_1',
                    'rules' => [
                        'min_quantity' => 4
                    ]
                ]),
            ]
        
        ]);

    }
}

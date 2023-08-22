<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CartSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {
        $this->call([
            ProductSeeder::class,
            CartSeeder::class,
            PromotionSeeder::class,
            Cart_ItemsSeeder::class
        ]);
    }
}

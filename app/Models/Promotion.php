<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {
    use HasFactory;

    protected $fillable = [
        'product_code',
        'rules'
    ];

    protected function getPromotionalProductCodes() {
        $promotionalProducts = Promotion::pluck('product_code')->toArray();
        return $promotionalProducts;
    }

    protected function getPromotionRules($productCode) {
        $promotion = Promotion::where('product_code', $productCode)->first();
        
        if ($promotion) {
            return json_decode($promotion->rules, true);
        }
        
        return [];
    }
}

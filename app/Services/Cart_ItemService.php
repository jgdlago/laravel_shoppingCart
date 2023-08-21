<?php

namespace App\Services;

use App\Models\Cart_items;
use App\Models\Promotion;
use App\Services\GenericService;

class Cart_ItemService extends GenericService {

    protected $promotion;

    public function __construct(Cart_items $cart_items, Promotion $promotion) {
        parent::__construct($cart_items);
        $this->promotion = $promotion;
    }

    public function create($data) {
        $cart_item = $data;
    
        $cart_item = $this->applySubtotal($cart_item);
        
        return parent::create($cart_item);
    }
    
    public function applySubtotal($cart_item) {
        $product = $cart_item['product'];
        $promotionalProductCodes = $this->promotion->getPromotionalProductCodes();
    
        if (in_array($product['product_code'], $promotionalProductCodes)) {
            $promotionRules = $this->promotion->getPromotionRules($product['product_code']);
            $subtotal = 0;
    
            switch ($promotionRules['promotion_type']) {
                case 'buy_1_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $subtotal = $product['price'] * ceil($cart_item['quantity'] / 2);
                    }
                    break;
    
                case 'min_amount':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $subtotal = $promotionRules['rules']['promotion_price'] * ceil($cart_item['quantity']);
                    }
                    break;
    
                case 'buy_3_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity'] && !array_key_exists('promotion_price', $promotionRules['rules'])) {
                        $freeBottles = floor($cart_item['quantity'] / $promotionRules['rules']['min_quantity']);
                        $subtotal = ($cart_item['quantity'] - $freeBottles) * $product['price'];
                    }
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity'] && array_key_exists('promotion_price', $promotionRules['rules'])) {
                        $subtotal = $promotionRules['rules']['promotion_price'] * ceil($cart_item['quantity']);
                    }
                    break;
    
                case 'buy_4_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $promotionPrice = $product['price'] * 0.9;
                        $subtotal = $cart_item['quantity'] * $promotionPrice;
                    }
                    break;
            }
    
            $cart_item['subtotal'] = $subtotal;
        }
    
        return $cart_item;
    }
   

}

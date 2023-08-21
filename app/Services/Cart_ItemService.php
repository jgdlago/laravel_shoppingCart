<?php

namespace App\Services;

use App\Models\Cart_items;
use App\Models\Product;
use App\Models\Promotion;
use App\Services\GenericService;

class Cart_ItemService extends GenericService {

    protected $promotion;
    protected $product;

    public function __construct(Cart_items $cart_items, Promotion $promotion, Product $product) {
        parent::__construct($cart_items);
        $this->promotion = $promotion;
        $this->product = $product;
    }

    public function create($data) {
        $cart_item = $data->all();
    
        $cart_item = $this->applySubtotal($cart_item);
        
        return parent::create($cart_item);
    }
    
    public function applySubtotal($cart_item) {
        $product_cart = Product::find($cart_item['product_id']);
        $promotionalProductCodes = $this->promotion->getPromotionalProductCodes();
    
        if (in_array($product_cart['product_code'], $promotionalProductCodes)) {
            $promotionRules = $this->promotion->getPromotionRules($product_cart['product_code']);
            $subtotal = 0;
    
            switch ($promotionRules['promotion_type']) {
                case 'buy_1_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $subtotal = $product_cart['price'] * ceil($cart_item['quantity'] / 2);
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
                        $subtotal = ($cart_item['quantity'] - $freeBottles) * $product_cart['price'];
                    }
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity'] && array_key_exists('promotion_price', $promotionRules['rules'])) {
                        $subtotal = $promotionRules['rules']['promotion_price'] * ceil($cart_item['quantity']);
                    }
                    break;
    
                case 'buy_4_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $promotionPrice = $product_cart['price'] * 0.9;
                        $subtotal = $cart_item['quantity'] * $promotionPrice;
                    }
                    break;
            }
        } else {
            $cart_item['subtotal'] = $cart_item['quantity'] * $product_cart['price'];
        }

    
        return $cart_item;
    }
   

}

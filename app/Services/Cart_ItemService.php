<?php

namespace App\Services;

use App\Models\Cart_items;
use App\Models\Product;
use App\Models\Promotion;
use App\Services\GenericService;

class Cart_ItemService extends GenericService {

    protected $promotion;
    protected $product;
    protected $cartService;
    public function __construct(Cart_items $cart_items, Promotion $promotion, Product $product, CartService $cartService) {
        parent::__construct($cart_items);
        $this->promotion = $promotion;
        $this->product = $product;
        $this->cartService = $cartService; 
    }

    public function create($data) {
        $cart_item = $data->all();
        $cart_item = $this->applySubtotal($cart_item);
        
        $createdCartItem = parent::create($cart_item);

        $this->cartService->updateTotalPrice($createdCartItem->cart);
        
        return $createdCartItem;
    }

    public function update($id, $data) {
        $cart_item = $data->all();
        $cart_item = $this->applySubtotal($cart_item);

        $updatedCartItem = parent::update($id, $cart_item);

        $this->cartService->updateTotalPrice($updatedCartItem->cart);

        return $updatedCartItem;
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
                        break;
                    }
    
                case 'min_amount':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $subtotal = $promotionRules['rules']['promotion_price'] * ceil($cart_item['quantity']);
                        break;
                    }
    
                case 'buy_3_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity'] && !array_key_exists('promotion_price', $promotionRules['rules'])) {
                        $freeBottles = floor($cart_item['quantity'] / $promotionRules['rules']['min_quantity']);
                        $subtotal = ($cart_item['quantity'] - $freeBottles) * $product_cart['price'];
                        break;
                    }
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity'] && array_key_exists('promotion_price', $promotionRules['rules'])) {
                        $subtotal = $promotionRules['rules']['promotion_price'] * ceil($cart_item['quantity']);
                        break;
                    }
    
                case 'buy_4_get_1':
                    if ($cart_item['quantity'] >= $promotionRules['rules']['min_quantity']) {
                        $promotionPrice = $product_cart['price'] * 0.9;
                        $subtotal = $cart_item['quantity'] * $promotionPrice;
                        break;
                    }
                default:
                    $subtotal = $cart_item['quantity'] * $product_cart['price'];
                    break;
            }
        } else {
            $subtotal = $cart_item['quantity'] * $product_cart['price'];
        }

        $subtotal = number_format($subtotal, 2, '.', '');
        $cart_item['subtotal'] = $subtotal;
    
        return $cart_item;
    }
   

}

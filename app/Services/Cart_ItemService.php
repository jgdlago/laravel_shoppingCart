<?php

namespace App\Services;

use App\Models\Cart_items;
use App\Models\Product;
use App\Services\GenericService;
use Ramsey\Uuid\Type\Decimal;

class Cart_ItemService extends GenericService {

    public function __construct(Cart_items $cart_items) {
        parent::__construct($cart_items);
    }

    public function create($data) {
        $cart_item = $data;
    
        $cart_item = $this->setSubtotalAndApplyPromotion($cart_item);
        // Criar cart_item
    
        return $cart_item;
    }
    
    public function setSubtotalAndApplyPromotion($cart_item) {
        $product = $cart_item['product'];
        $promotionalProductCodes = json_decode($cart_item['cart']['promotional_product_codes']);
    
        $cart_item['subtotal'] = $product['price'] * $cart_item['quantity'];
    
        if (in_array($product['product_code'], $promotionalProductCodes)) {
            // Promoção
        }
    
        return $cart_item;
    }
    

}

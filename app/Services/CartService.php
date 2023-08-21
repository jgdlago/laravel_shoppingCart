<?php

namespace App\Services;

use App\Models\Cart;
use App\Services\GenericService;

class CartService extends GenericService {

    public function __construct(Cart $cartModel) {
        parent::__construct($cartModel);
    }

    public function updateTotalPrice(Cart $cart) {
        $cartItems = $cart->cartItems;
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->subtotal;
        }

        $cart->total_price = $totalPrice;
        $cart->save();

        return $cart;
    }

}

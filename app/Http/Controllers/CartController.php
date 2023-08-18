<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends GenericController {

    public function __construct(CartService $cartService) {
        parent::__construct($cartService);
    }

    public function createCart(Request $request) {
        return parent::create($request);
    }

    public function updateCart(Request $request, $id) {
        return parent::update($request, $id);
    }

    public function deleteCart($id) {
        return parent::delete($id);
    }

}

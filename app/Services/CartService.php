<?php

namespace App\Services;

use App\Models\Cart;
use App\Services\GenericService;

class CartService extends GenericService {

    public function __construct(Cart $cartModel) {
        parent::__construct($cartModel);
    }

}

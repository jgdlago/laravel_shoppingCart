<?php

namespace App\Services;

use App\Models\Product;
use App\Services\GenericService;

class ProductService extends GenericService {

    public function getAllProducts() {
        return $this->getAll(Product::class);
    }

    public function createProduct($data) {
        return Product::create($data);
    }

}

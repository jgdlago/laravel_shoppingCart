<?php

namespace App\Services;

use App\Models\Product;
use App\Services\GenericService;

class ProductService extends GenericService {

    public function getAllProducts() {
        return $this->getAll(Product::class);
    }

    public function createProduct($data) {
        return $this->create(Product::class, $data);
    }

    public function updateProduct($data, $id) {
        return $this->update(Product::class, $data, $id);
    }

}

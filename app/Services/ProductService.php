<?php

namespace App\Services;

use App\Models\Product;
use App\Services\GenericService;

class ProductService extends GenericService {

    public function __construct(Product $productModel) {
        parent::__construct($productModel);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Services\ProductService;

class ProductController extends GenericController {
    public function __construct(ProductService $productService) {
        parent::__construct($productService);
    }

    public function createProduct(ProductFormRequest $request) {
        return parent::create($request);
    }

    public function updateProduct(ProductFormRequest $request, $id) {
        return parent::update($request, $id);
    }

    public function deleteProduct($id) {
        return parent::delete($id);
    }
}

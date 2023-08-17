<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {

    protected $productService;
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    
    public function getAllProducts() {
        return $this->productService->getAllProducts();
    }

    public function createProduct(ProductFormRequest $request) {
        $data = $request->all();

        $createdProduct = $this->productService->createProduct($data);

        if ($createdProduct) {
            return response()->json([
                'message' => 'Product created successfully.',
                'data' => $createdProduct
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to create product.'
            ], 500);
        }
    }

    public function updateProduct(ProductFormRequest $request, $id) {
        $data = $request->all();

        $updatedProduct = $this->productService->updateProduct($data, $id);

        if ($updatedProduct) {
            return response()->json([
                'message' => 'Product updated successfully.',
                'data' => $updatedProduct
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to update product.'
            ], 500);
        }

    }

}

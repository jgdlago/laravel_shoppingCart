<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {

    protected $productService;
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    
    public function getAllProducts() {
        return $this->productService->getAll(Product::class);
    }

    public function createProduct(ProductFormRequest $request) {
        $data = $request->all();

        $createdProduct = $this->productService->create(Product::class, $data);

        return $this->httpCustomResponse($createdProduct, "Create");
    }

    public function updateProduct(ProductFormRequest $request, $id) {
        $data = $request->all();

        $updatedProduct = $this->productService->update(Product::class, $data, $id);

        return $this->httpCustomResponse($updatedProduct, "Update");

    }

    public function deleteProduct($id) {
        $deletedProduct = $this->productService->delete(Product::class, $id);
        return $this->httpCustomResponse($deletedProduct, "Delete");
    }





    public function httpCustomResponse($product, $action) {

        if ($product) {
            return response()->json([
                'message' => $action . ' success',
                'data' => $product
            ], 201);
        } else {
            return response()->json([
                'message' => $action . ' error'
            ], 500);
        }

    }


}

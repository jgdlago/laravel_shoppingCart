<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends GenericController {
    protected $handler;
    public function __construct(ProductService $productService) {
        parent::__construct($productService);
    }

    public function createProduct(ProductFormRequest $request): JsonResponse {
        try {
            $createdItem = parent::create($request);
            return response()->json([
                'message' => 'Create success',
                'data' => $createdItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create product'
            ], 500); 
        }
    }

    public function updateProduct(ProductFormRequest $request, $id): JsonResponse {
        try {
            $updatedItem = parent::update($request, $id);
            return response()->json([
                'message' => 'Updated success',
                'data' => $updatedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update product'
            ], 500); 
        }
    }

    public function deleteProduct($id): JsonResponse {
        try {
            $deletedItem = parent::delete($id);
            return response()->json([
                'message' => 'Deleted success',
                'data' => $deletedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete product'
            ], 500);
        }
    }
}

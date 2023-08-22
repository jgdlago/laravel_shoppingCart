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

    /**
     * @OA\Post(
     *     path="/api/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         description="Product data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Product Name"),
     *             @OA\Property(property="product_code", type="string", example="ABC123"),
     *             @OA\Property(property="description", type="string", example="Product description"),
     *             @OA\Property(property="price", type="number", format="float", example=10.99),
     *             @OA\Property(property="unit_of_measurement", type="string", example="500g"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product created successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to create product")
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/products",
     *     summary="Update a product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         description="Product data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example="1"),
     *             @OA\Property(property="name", type="string", example="Product Name"),
     *             @OA\Property(property="product_code", type="string", example="ABC123"),
     *             @OA\Property(property="description", type="string", example="Product description"),
     *             @OA\Property(property="price", type="number", format="float", example=10.99),
     *             @OA\Property(property="unit_of_measurement", type="string", example="500g"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product updated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product updated successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to update product")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     summary="Delete a product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product to delete",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Deleted success"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=500, description="Failed to delete product")
     * )
     */
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

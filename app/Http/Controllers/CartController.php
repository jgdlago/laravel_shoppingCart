<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends GenericController {

    public function __construct(CartService $cartService) {
        parent::__construct($cartService);
    }

        /**
     * @OA\Post(
     *     path="/api/carts",
     *     summary="Create a new cart",
     *     tags={"Carts"},
     *     @OA\RequestBody(
     *         description="Cart data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="total_price", type="number", format="float", example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cart created",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="cart created successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to create cart")
     * )
     */
    public function createCart(Request $request) {
        try {
            $createdItem = parent::create($request);
            return response()->json([
                'message' => 'Create success',
                'data' => $createdItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create cart'
            ], 500);
        }
    }

        /**
     * @OA\Put(
     *     path="/api/cart",
     *     summary="Update a product",
     *     tags={"Carts"},
     *     @OA\RequestBody(
     *         description="Cart data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example="1"),
     *             @OA\Property(property="total_price", type="number", format="float", example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cart updated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Cart updated successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to update cart")
     * )
     */
    public function updateCart(Request $request, $id) {
        try {
            $updatedItem =  parent::update($request, $id);
            return response()->json([
                'message' => 'Updated success',
                'data' => $updatedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update cart'
            ], 500);
        }
    }

        /**
     * @OA\Delete(
     *     path="/api/carts/{id}",
     *     summary="Delete a cart",
     *     tags={"Carts"},
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
     *         description="Cart deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Deleted success"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=500, description="Failed to delete cart")
     * )
     */
    public function deleteCart($id) {
        try {
            $deletedItem =  parent::delete($id);
            return response()->json([
                'message' => 'Deleted success',
                'data' => $deletedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete cart'
            ], 500);
        }
    }

}

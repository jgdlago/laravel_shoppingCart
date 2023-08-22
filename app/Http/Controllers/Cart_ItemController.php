<?php 

namespace App\Http\Controllers;

use App\Services\Cart_ItemService;
use Illuminate\Http\Request;

class Cart_ItemController extends GenericController {
    protected $cart_ItemService;

    public function __construct(Cart_ItemService $cart_ItemService) {
        parent::__construct($cart_ItemService);
        $this->cart_ItemService = $cart_ItemService;
    }

        /**
     * @OA\Post(
     *     path="/api/cart_item",
     *     summary="Create a new cart_item",
     *     tags={"Cart_item"},
     *     @OA\RequestBody(
     *         description="Cart_item data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="cart_id", type="integer", example="1"),
     *             @OA\Property(property="product_id", type="integer", example="1"),
     *             @OA\Property(property="quantity", type="integer", example="1"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Cart item created successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to create cart item")
     * )
     */
    public function createCart_Item(Request $request) {
        try {
            $createdItem = $this->cart_ItemService->create($request);
            return response()->json([
                'message' => 'Create success',
                'data' => $createdItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create cart item'
            ], 500); 
        }
    }

            /**
     * @OA\Put(
     *     path="/api/cart_item",
     *     summary="Create a new cart_item",
     *     tags={"Cart_item"},
     *     @OA\RequestBody(
     *         description="Cart_item data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="cart_item_id", type="integer", example="1"),
     *             @OA\Property(property="cart_id", type="integer", example="1"),
     *             @OA\Property(property="product_id", type="integer", example="1"),
     *             @OA\Property(property="quantity", type="integer", example="1"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Cart item updated successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to update cart item")
     * )
     */
    public function updateCart_Item(Request $request, $id) {
        try {
            $updatedItem = $this->cart_ItemService->update($request, $id);
            return response()->json([
                'message' => 'Updated success',
                'data' => $updatedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update cart item'
            ], 500);
        }
    }

        /**
     * @OA\Delete(
     *     path="/api/cart_item/{id}",
     *     summary="Delete a cart item",
     *     tags={"Cart_item"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the cart item to delete",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cart item deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Deleted success"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=500, description="Failed to delete cart item")
     * )
     */
    public function deleteCart_Item($id) {
        try {
            $deletedItem = parent::delete($id);
            return response()->json([
                'message' => 'Deleted success',
                'data' => $deletedItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete cart item'
            ], 500);
        }
    }
    
}

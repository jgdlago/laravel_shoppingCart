<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends GenericController {

    public function __construct(CartService $cartService) {
        parent::__construct($cartService);
    }

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

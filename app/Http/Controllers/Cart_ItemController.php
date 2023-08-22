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

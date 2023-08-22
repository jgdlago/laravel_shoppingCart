<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionFormRequest;
use App\Services\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends GenericController {
    protected $promotionService;
    public function __construct(PromotionService $promotionService) {
        parent::__construct($promotionService);
        $this->promotionService = $promotionService;
    }

    public function createPromotion(PromotionFormRequest $request) {
        try {
            $data = [
                'product_code' => $request->input('product_code'),
                'rules' => $request->input('rules'),
            ];

            $createdItem = $this->promotionService->create($data);
            return response()->json([
                'message' => 'Created success',
                'data' => $createdItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create promotion'
            ], 500);
        }
    }

    public function updatePromotion(PromotionFormRequest $request, $id) {
        try {
            $data = [
                'product_code' => $request->input('product_code'),
                'rules' => $request->input('rules'),
            ];
        
            $updatedItem = $this->promotionService->update($id, $data);
            return response()->json([
                'message' => 'Updated success',
                'data' => $updatedItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update promotion'
            ], 500);
        }
    }

    public function deletePromotion($id) {
        try {
            $deletedItem = parent::delete($id);
            return response()->json([
                'message' => 'Deleted success',
                'data' => $deletedItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete promotion'
            ], 500);
        }
    }
}

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

        /**
     * @OA\Post(
     *     path="/api/promotions",
     *     summary="Create a new promotion",
     *     tags={"Promotion"},
     *     @OA\RequestBody(
     *         description="Promotion data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="product_code", type="string", example="ABC123"),
     *             @OA\Property(property="rules", type="string", example="promotion_type:buy_1_get_1 rules:min_quantity:1")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Promotion created",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Promotion created successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to create Promotion")
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/promotions",
     *     summary="Update a new promotion",
     *     tags={"Promotion"},
     *     @OA\RequestBody(
     *         description="Promotion data",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example="1"),
     *             @OA\Property(property="product_code", type="string", example="ABC123"),
     *             @OA\Property(property="rules", type="string", example="promotion_type:buy_1_get_1 rules:min_quantity:1")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Promotion updated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Promotion updated successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=500, description="Failed to create Promotion")
     * )
     */
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

        /**
     * @OA\Delete(
     *     path="/api/promotions/{id}",
     *     summary="Delete a promotion",
     *     tags={"Promotion"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the promotion to delete",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Promotion deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Deleted success"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(response=500, description="Failed to delete Promotion")
     * )
     */
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

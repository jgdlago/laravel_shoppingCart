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
        $data = [
            'product_code' => $request->input('product_code'),
            'rules' => $request->input('rules'),
        ];

        return $this->promotionService->create($data);
    }

    public function updatePromotion(PromotionFormRequest $request, $id) {
        $data = [
            'product_code' => $request->input('product_code'),
            'rules' => $request->input('rules'),
        ];
    
        return $this->promotionService->update($id, $data);
    }
    

    public function deletePromotion($id) {
        return parent::delete($id);
    }
}

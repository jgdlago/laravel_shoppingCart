<?php

namespace App\Services;

use App\Models\Promotion;
use App\Services\GenericService;

class PromotionService extends GenericService {

    public function __construct(Promotion $promotionModel) {
        parent::__construct($promotionModel);
    }

    public function create($data) {
        $data['rules'] = json_encode($data['rules']);
        return parent::create($data);
    }

    public function update($id, $data) {
        if (isset($data['rules'])) {
            $data['rules'] = json_encode($data['rules']);
        }
        return parent::update($id, $data);
    }
       
}

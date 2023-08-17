<?php

namespace App\Services;

class GenericService {
    
    public function getAll($modelClass) {
        return $modelClass::all();
    }
    
}

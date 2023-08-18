<?php

namespace App\Services;

class GenericService {

    public function getAll($modelClass) {
        return $modelClass::all();
    }

    public function create($modelClass, $data) { // Adicione $data como argumento
        return $modelClass::create($data);
    }

    public function update($modelClass, $data, $id) { // Adicione $data e $id como argumentos
        $findProduct = $modelClass::find($id);
        return $findProduct->update($data);
    }

    public function delete($modelClass, $id) {
        $findProduct = $modelClass::find($id);
        return $findProduct->delete();
    }
    
}


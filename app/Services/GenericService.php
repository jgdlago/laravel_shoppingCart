<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class GenericService {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model::all();
    }

    public function create($data) {
        return $this->model::create($data);
    }

    public function update($id, $data) {
        $item = $this->model::findOrFail($id);
        $item->update($data);
        return $item;
    }    

    public function delete($id) {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return $item;
    }

    public function findById($id) {
        return $this->model::findOrFail($id);
    }
}

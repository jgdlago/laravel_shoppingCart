<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenericService;
use Illuminate\Routing\Controller;

class GenericController extends Controller {
    protected $service;

    public function __construct(GenericService $service) {
        $this->service = $service;
    }

    public function getAll() {
        return $this->service->getAll();
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $createdItem = $this->service->create($data);
        return $this->httpCustomResponse($createdItem, "Create");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $updatedItem = $this->service->update($data, $id);
        return $this->httpCustomResponse($updatedItem, "Update");
    }

    public function delete($id)
    {
        $deletedItem = $this->service->delete($id);
        return $this->httpCustomResponse($deletedItem, "Delete");
    }
    

    public function httpCustomResponse($item, $action) {
        if ($item) {
            return response()->json([
                'message' => $action . ' success',
                'data' => $item
            ], 201);
        } else {
            return response()->json([
                'message' => $action . ' error'
            ], 500);
        }
    }

}

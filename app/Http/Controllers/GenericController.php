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
        try {
            return $this->service->getAll();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'search failed'
            ], 500);
        }
    }

    public function findById($id) {
        try {
            $findItem = $this->service->findById($id);
            return response()->json([
                'message' => 'Find success',
                'data' => $findItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'search failed'
            ], 500);
        }
    }

    public function create(Request $request) {
        $data = $request->all();
        
        try {
            $createdItem = $this->service->create($data);
            return response()->json([
                'message' => 'Create success',
                'data' => $createdItem
            ], 201);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        
        try {
            $updatedItem = $this->service->update($id, $data);
            return response()->json([
                'message' => 'Update success',
                'data' => $updatedItem
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function delete($id) {
        try {
            $deletedItem = $this->service->delete($id);
            return response()->json([
                'message' => 'Delete success',
                'data' => $deletedItem
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

}


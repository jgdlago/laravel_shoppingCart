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
        return $this->cart_ItemService->create($request);
    }

    public function updateCart_Item(Request $request, $id) {
        return $this->cart_ItemService->update($request, $id);
    }

    public function deleteCart_Item($id) {
        return parent::delete($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Shopping cart laravel API",
 *     version="1.0.0",
 *     description="Controller responsible for Product CRUD methods"
 * )
 */

class ProductController extends Controller {
    
/**
 * @OA\Get(
 *     path="/api/products",
 *     summary="Get a list of products",
 *     tags={"Products"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     ),
 * )
 */
    public function getAllProducts() {
        return Product::all();
    }

}
